# -*- coding: utf-8 -*-
import time
from pyvirtualdisplay import Display
from selenium import webdriver
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait

print("teste2e for US2 starting... ")

display = Display(visible=0, size=(800, 600))
display.start()

driver = webdriver.Firefox()
driver.get("http://localhost/index.php")
elem = driver.find_element(By.XPATH, '//a[text() = "Inscription"]')
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Inscription" in driver.title
elem = driver.find_element(By.XPATH, '//input[@name=\"username\"]')
elem.click()
elem.send_keys('user1')

elem = driver.find_element(By.XPATH, '//input[@name=\"password\"]')
elem.click()
elem.send_keys('password1')

elem = driver.find_element(By.XPATH, '//input[@name=\"firstname\"]')
elem.click()
elem.send_keys('firstname1')

elem = driver.find_element(By.XPATH, '//input[@name=\"lastname\"]')
elem.click()
elem.send_keys('lastname1')

elem = driver.find_element(By.XPATH, '//input[@name=\"email\"]')
elem.click()
elem.send_keys('email1@email.fr')

elem = driver.find_element(By.XPATH, '//button[@type=\"submit\"]')
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Index" in driver.title

elems = driver.find_elements(By.XPATH, '//span[text() = "Votre compte a été créé"]')
assert len(elems) > 0

print("teste2e for US2: done.")
driver.close()
