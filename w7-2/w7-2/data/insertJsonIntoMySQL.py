import json
import mysql.connector

# Load JSON data from the file
with open("C:/the path to your file", encoding='utf8') as json_file:
    json_data = json.load(json_file)
print("File found")
# MySQL database connection details
host = "127.0.0.1"
user = "user"
password = "password"
database = "database_name"
table_name = "table_name"

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
INSERT INTO {table_name} (Col1, Col2, Col3, Col4, Col5)
VALUES (%s, %s, %s, %s, %s, %s, %s);
"""

for item in json_data:
    Col1 = item["Col1"]
    Col2 = item["Col2"]
    Col3 = item["Col3"]
    Col4 = item["Col4"]
    Col5 = item["Col5"]


    data_to_insert = (Col1, Col2, Col3, Col4, Col5)

    cursor.execute(insert_query, data_to_insert)

# Commit the changes and close the connection
connection.commit()
connection.close()

print("Data from JSON file inserted into the MySQL table successfully.")

# This script can be run in your IDE of choice 