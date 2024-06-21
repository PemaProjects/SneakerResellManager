from selenium import webdriver
from selenium.webdriver.chrome.service import Service as ChromeService
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from bs4 import BeautifulSoup
import time
import re
import mysql.connector


chrome_options = Options()
chrome_options.add_argument("--headless") 
chrome_options.add_argument("--no-sandbox")
chrome_options.add_argument("--disable-dev-shm-usage")


selenium_service = ChromeService('/usr/bin/chromedriver')
driver = webdriver.Remote(
    command_executor='http://selenium:4444/wd/hub',
    options=chrome_options
)

conn = mysql.connector.connect(
    host='db',
    user='root',
    password='root',
    database='snkrs'
)

cursor = conn.cursor()

page = 1
total = 0

while True:
    url = f"https://stockx.com/sneakers?page={page}"
    driver.get(url)

    time.sleep(5)

    page_content = driver.page_source

    soup = BeautifulSoup(page_content, 'html.parser')

    sneakers = soup.find_all('div', class_=re.compile(r'\bGridProductTileContainer\b'))

    for sneaker in sneakers:
        title = sneaker.find('p', attrs={'data-testid': 'product-tile-title'})
        img = sneaker.find('img', class_=re.compile(r'\bchakra-image\b'))
        if title and img:
            print("Este es el titulo:", title.text)
            print("Este es la imagen:", img.get('src'))
            
            cursor.execute("SELECT name FROM sneakers WHERE name = %s", (title.text,))
            result = cursor.fetchone()
            
            if result is None:
                sql = "INSERT INTO sneakers (name, img) VALUES (%s, %s)"
                values = (title.text, img.get('src'))
                cursor.execute(sql, values)
                conn.commit()
            else:
                print(f"El sneaker {title.text} ya está en la base de datos")
            
            total += 1

    next_button = soup.find('a', attrs={'aria-label': 'Next'})
    if not next_button:
        break 

    page += 1

cursor.close()
conn.close()

driver.quit()

print(f"\nTotal de elementos encontrados: {total}")
