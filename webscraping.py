import requests
from bs4 import BeautifulSoup

mainContent = requests.get("https://glovoapp.com/ma/fr/casablanca/kfc-cas/")
print(mainContent.text)
soup = BeautifulSoup(mainContent.text,'lxml')
titleall = soup.find_all('div', class_='card-title')
print(titleall)
title_list =[]
for item in titleall:
    individualtitle = item.get_text() 
    title_list.append(individualtitle)

print(title_list)
# import csv
# with open('pythonscraper.csv','w') as csvfile:
#     writer = csv.writer(csvfile)
#     for item in title_list:
#         writer.writerow([item])
