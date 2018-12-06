# -*- coding: utf-8 -*-
import time
from pyvirtualdisplay import Display
from selenium import webdriver
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait

print("teste2e for US4 starting... ")

display = Display(visible=0, size=(800, 600))
display.start()

driver = webdriver.Firefox()
driver.get("http://localhost/index.php")

#Sign up for user2 in the application
elem = driver.find_element(By.XPATH, '//a[text() = "Inscription"]')
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Inscription" in driver.title
elem = driver.find_element(By.XPATH, '//input[@name=\"username\"]')
elem.click()
elem.send_keys('user2')

elem = driver.find_element(By.XPATH, '//input[@name=\"password\"]')
elem.click()
elem.send_keys('password2')

elem = driver.find_element(By.XPATH, '//input[@name=\"firstname\"]')
elem.click()
elem.send_keys('firstname2')

elem = driver.find_element(By.XPATH, '//input[@name=\"lastname\"]')
elem.click()
elem.send_keys('lastname2')

elem = driver.find_element(By.XPATH, '//input[@name=\"email\"]')
elem.click()
elem.send_keys('email2@email.fr')

elem = driver.find_element(By.XPATH, '//button[@type=\"submit\"]')
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Index" in driver.title
elems = driver.find_elements(By.XPATH, '//span[text() = "Votre compte a été créé"]')
assert len(elems) > 0

elem = driver.find_element(By.XPATH, '//input[@name=\"username\"]')
elem.click()
elem.send_keys("root")
elem = driver.find_element(By.XPATH, '//input[@name=\"password\"]')
elem.click()
elem.send_keys("root")
elem = driver.find_element(By.XPATH, '//input[@type=\"submit\"]')
elem.click()

wait = WebDriverWait(driver, timeout=10)
assert "Liste des projets" in driver.title

elem = driver.find_element_by_id("add_project_link")
elem.click()
wait = WebDriverWait(driver, timeout=10)

assert "Ajouter un projet" in driver.title
elem = driver.find_element_by_id("name-input")
elem.click()
elem.send_keys("TestProjectUS4")
elem = driver.find_element_by_id("content")
elem.click()
elem.send_keys("Description")
elem = driver.find_element_by_id("dureeSprint-input")
elem.click()
elem.send_keys("3")
elem = driver.find_element_by_id("date-input")
elem.click()
driver.execute_script("document.querySelector('input[type=\"date\"]').valueAsDate = new Date('06/04/2019')")

elem = driver.find_element(By.XPATH, '//form')
elem.submit()

wait = WebDriverWait(driver, timeout=10)
driver.get("http://localhost/project_list.php")

assert "Liste des projets" in driver.title
wait = WebDriverWait(driver, timeout=10)

elem = driver.find_element_by_link_text("TestProjectUS4")
elem.click()
wait = WebDriverWait(driver, timeout=10)
print(driver.title)
assert ("Les détails de ce projet :").decode('utf-8') in (driver.title).encode('utf-8').decode('utf-8')

elem = driver.find_element_by_id("membre-button")
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Ajouter un nouveau membre" in driver.title

elem = driver.find_element_by_id("username-input")
elem.click()
elem.send_keys("user2")
elem = driver.find_element(By.XPATH, '//form')
elem.submit()

wait = WebDriverWait(driver, timeout=15)
print("teste2e for US4: done.")
driver.close()
