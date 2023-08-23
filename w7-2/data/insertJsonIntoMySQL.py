import json
import mysql.connector

# Load JSON data from the file
with open("C:/Users/Arturo Duran/OneDrive/Escritorio/Insert JSON in SQL/triviaQuestionsSimple.json") as json_file:
    json_data = json.load(json_file)

# MySQL database connection details
host = "127.0.0.1"
user = "root"
password = "Nu191036673"
database = "time4trivia"
table_name = "triviaquestions"

# Create a connection to the MySQL database
connection = mysql.connector.connect(
    host=host,
    user=user,
    password=password,
    database=database
)

# Create a cursor to execute SQL queries
cursor = connection.cursor()

# Create the MySQL table (only if it doesn't exist)
create_table_query = f"""
CREATE TABLE IF NOT EXISTS triviaquestions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    correct_answer VARCHAR(255) NOT NULL,
    incorrect_answer_1 VARCHAR(255) NOT NULL,
    incorrect_answer_2 VARCHAR(255) NOT NULL,
    incorrect_answer_3 VARCHAR(255) NOT NULL,
    isVerified BIT NOT NULL
);
"""
cursor.execute(create_table_query)

# Insert data into the table
insert_query = f"""
INSERT INTO {table_name} (question, correct_answer, incorrect_answer_1, incorrect_answer_2, incorrect_answer_3, isVerified)
VALUES (%s, %s, %s, %s, %s, %s);
"""

for item in json_data:
    question = item["question"]
    correct_answer = item["correct_answer"]
    incorrect_answers = item["incorrect_answers"]
    incorrect_answer_1, incorrect_answer_2, incorrect_answer_3 = incorrect_answers
    isVerified = item['isVerified']

    data_to_insert = (question, correct_answer, incorrect_answer_1, incorrect_answer_2, incorrect_answer_3, isVerified)

    cursor.execute(insert_query, data_to_insert)

# Commit the changes and close the connection
connection.commit()
connection.close()

print("Data from JSON file inserted into the MySQL table successfully.")
