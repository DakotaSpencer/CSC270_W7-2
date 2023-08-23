import json
import mysql.connector

# Load JSON data from the file
with open("C:/Users/Sabrina/Desktop/Y3/Q4/Solution Stack/W7/W7-2/CSC270_W7-2/w7-2/w7-2/data/womens_clothing.json", encoding='utf8') as json_file:
    json_data = json.load(json_file)
print("file found")
# MySQL database connection details
host = "127.0.0.1"
user = "root"
password = "Nu200240853"
database = "final"
table_name = "products"

# Create a connection to the MySQL database
connection = mysql.connector.connect(
    host=host,
    user=user,
    password=password,
    database=database
)

# Create a cursor to execute SQL queries
cursor = connection.cursor()

# Insert data into the table
insert_query = f"""
INSERT INTO {table_name} (title, price, description, category, image, rating, rateCount)
VALUES (%s, %s, %s, %s, %s, %s, %s);
"""

for item in json_data:
    title = item["title"]
    price = item["price"]
    description = item["description"]
    category = item["category"]
    image = item["image"]
    rating = item["rating"]
    rateCount = item["rateCount"]


    data_to_insert = (title, price, description, category, image, rating, rateCount)

    cursor.execute(insert_query, data_to_insert)

# Commit the changes and close the connection
connection.commit()
connection.close()

print("Data from JSON file inserted into the MySQL table successfully.")