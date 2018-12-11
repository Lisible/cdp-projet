import time
from pyvirtualdisplay import Display
from selenium import webdriver
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait

print("Début de la démo")

driver = webdriver.Firefox()
driver.get("http://localhost/index.php")

input()

elem = driver.find_element(By.XPATH, '//a[text() = "Inscription"]')
elem.click()
wait = WebDriverWait(driver, timeout=10)
elem = driver.find_element(By.XPATH, '//input[@name=\"username\"]')
elem.click()
elem.send_keys('johndoe')

elem = driver.find_element(By.XPATH, '//input[@name=\"password\"]')
elem.click()
elem.send_keys('john')

elem = driver.find_element(By.XPATH, '//input[@name=\"firstname\"]')
elem.click()
elem.send_keys('John')

elem = driver.find_element(By.XPATH, '//input[@name=\"lastname\"]')
elem.click()
elem.send_keys('Doe')

elem = driver.find_element(By.XPATH, '//input[@name=\"email\"]')
elem.click()
elem.send_keys('john@doe.com')

input()

elem = driver.find_element(By.XPATH, '//button[@type=\"submit\"]')
elem.click()
wait = WebDriverWait(driver, timeout=10)

input()

elem = driver.find_element(By.XPATH, '//input[@name=\"username\"]')
elem.click()
elem.send_keys("johndoe")
elem = driver.find_element(By.XPATH, '//input[@name=\"password\"]')
elem.click()
elem.send_keys("john")

input()

elem = driver.find_element(By.XPATH, '//input[@type=\"submit\"]')
elem.click()

input()

# Ajout de projet
elem = driver.find_element_by_id("add_project_link")
elem.click()
wait = WebDriverWait(driver, timeout=10)

input()

elem = driver.find_element_by_id("name-input")
elem.click()
elem.send_keys("Faire une pizza")
elem = driver.find_element_by_id("content")
elem.click()
elem.send_keys("Pizza sans ananas")
elem = driver.find_element_by_id("dureeSprint-input")
elem.click()
elem.send_keys("3")
elem = driver.find_element_by_id("date-input")
elem.click()
driver.execute_script("document.querySelector('input[type=\"date\"]').valueAsDate = new Date('07/12/2019')")

input()

elem = driver.find_element(By.XPATH, '//form')
elem.submit()

input()

elem = driver.find_element_by_link_text("Faire une pizza")
elem.click()

input()

elem = driver.find_element_by_id("membre-button")
elem.click()

input()

elem = driver.find_element_by_id("username-input")
elem.click()
elem.send_keys("root")

input()

elem = driver.find_element(By.XPATH, '//form')
elem.submit()

input()

elem = driver.find_element_by_id("backlog-button")
elem.click()

input()

elem = driver.find_element_by_id("add_user_story_link")
elem.click()

input()

elem = driver.find_element_by_id("number_us")
elem.click()
elem.send_keys("1")

elem = driver.find_element_by_id("priority_h")
elem.click()

elem = driver.find_element_by_id("difficulty")
elem.click()
elem.send_keys("1")

elem = driver.find_element_by_id("description")
elem.click()
elem.send_keys("En tant que convive je dois pouvoir manger une part de pizza afin de me régaler")

input()

elem = driver.find_element(By.XPATH, '//form')
elem.submit()

input()

driver.get("http://localhost/project_list.php")
wait = WebDriverWait(driver, timeout=10)
elem = driver.find_element_by_link_text("Faire une pizza")
elem.click()

input()

elem = driver.find_element_by_id("sprint-button")
elem.click()

input()

elem = driver.find_element_by_id("add-sprint")
elem.click()

input()

elem = driver.find_element_by_id("add-sprint")
elem.click()

input()

elem = driver.find_element(By.XPATH, '//li/button')
elem.click()

input()

elem = driver.find_element_by_link_text("Ajouter une tâche")
elem.click()

input()

elem = driver.find_element_by_id("task-title")
elem.click()
elem.send_keys("Une tâche")

elem = driver.find_element_by_id("task-workload")
elem.click()
elem.send_keys("1")

elem = driver.find_element_by_id("task-issue")
elem.click()
elem.send_keys("1")

input()

elem = driver.find_element(By.XPATH, '//form')
elem.submit()

driver.execute_script("window.history.go(-1)")

input()