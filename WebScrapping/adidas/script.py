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

url = f"https://www.adidas.es/api/plp/content-engine?&query=zapatillas-hombre&start=0"
driver.get(url)

time.sleep(5)

page_content = driver.page_source

soup = BeautifulSoup(page_content, 'html.parser')

print(soup)

cursor.close()
conn.close()

driver.quit()

print(f"\nTotal de elementos encontrados: {total}")
