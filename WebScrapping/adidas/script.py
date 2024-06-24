from bs4 import BeautifulSoup
import time
import re
import mysql.connector
import requests
import json

conn = mysql.connector.connect(
    host='db',
    user='root',
    password='root',
    database='snkrs'
)

cursor = conn.cursor()

total = 0

hdr = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0',
    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept-Language': 'en-US,en;q=0.5',
    'Accept-Encoding': 'gzip, deflate, br',
    'Connection': 'keep-alive',
    'Upgrade-Insecure-Requests': '1',
    'TE': 'Trailers'
}

def scrap_adidas(url):
    total = 0
    while True:
        html_page = requests.get(url + f"?start={total}", headers=hdr, timeout=15)
        soup = BeautifulSoup(html_page.content, 'html.parser')

        paginationNext = soup.find('a', attrs={'data-auto-id': 'plp-pagination-next'})

        sneakers = soup.find_all('div', class_='grid-item')

        for sneaker in sneakers:
            total += 1

            name = sneaker.find('p', class_='glass-product-card__title')
            img = sneaker.find('img', attrs={'data-auto-id': 'product-card-image'})
            
            cursor.execute("SELECT name FROM sneakers WHERE name = %s", (name.text,))
            result = cursor.fetchone()
            
            if result is None:
                sql = "INSERT INTO sneakers (name, img) VALUES (%s, %s)"
                values = (name.text, img.get('src'))
                cursor.execute(sql, values)
                conn.commit()
                print(f"Sneaker introducido correctamente")
            else:
                print(f"El sneaker {name.text} ya está en la base de datos")
        if not paginationNext:
            break

scrap_adidas("https://www.adidas.com/us/men-shoes")
scrap_adidas("https://www.adidas.com/us/women-shoes")

cursor.close()
conn.close()
