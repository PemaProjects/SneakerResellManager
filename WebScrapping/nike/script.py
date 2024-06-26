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


def scrape_nike_data(urlRev):
    url = urlRev

    response = requests.get(url, timeout=15)
    data = response.json()


    while data["pages"]["next"] != "":
        for obj in data["objects"]:
            product_info = obj.get("productInfo", [])
            
            for product in product_info:
                merch_product = product.get("merchProduct", {})
                product_content = product.get("productContent", {})
                image_urls = product.get("imageUrls", {})
                
                title = product_content.get('title')
                subtitle = product_content.get('subtitle')
                color_description = product_content.get('colorDescription')
                product_image_url = image_urls.get('productImageUrl')
                price = product.get('merchPrice', {}).get('fullPrice')
                print("-" * 50)

                cursor.execute("SELECT name FROM sneakers WHERE name = %s", (title,))
                result = cursor.fetchone()
                
                if result is None:
                    sql = "INSERT INTO sneakers (name, img) VALUES (%s, %s)"
                    values = (title, product_image_url)
                    cursor.execute(sql, values)
                    conn.commit()
                    print(f"Sneaker introducido correctamente")
                else:
                    print(f"El sneaker {title} ya está en la base de datos")

        
        api_url="https://api.nike.com" + data["pages"]["next"]
        response = requests.get(api_url, timeout=15)
        data = response.json()

scrape_nike_data("https://api.nike.com/product_feed/rollup_threads/v2?filter=marketplace%28US%29&filter=language%28en%29&filter=employeePrice%28true%29&filter=attributeIds%2816633190-45e5-4830-a068-232ac7aea82c%2C0f64ecc7-d624-4e91-b171-b83a03dd8550%29&anchor=0&consumerChannelId=d9a5bc42-4b9c-4976-858a-f159cf99c647&count=24")
print("Scraping Nike")
scrape_nike_data("https://api.nike.com/product_feed/rollup_threads/v2?filter=marketplace%28US%29&filter=language%28es-419%29&filter=employeePrice%28true%29&filter=attributeIds%287baf216c-acc6-4452-9e07-39c2ca77ba32%2C16633190-45e5-4830-a068-232ac7aea82c%29&anchor=0&consumerChannelId=d9a5bc42-4b9c-4976-858a-f159cf99c647&count=24")


