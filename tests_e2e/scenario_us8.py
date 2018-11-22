# -*- coding: utf-8 -*-
import time
from pyvirtualdisplay import Display
from selenium import webdriver
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait

display = Display(visible=0, size=(800,600))
display.start()

driver = webdriver.Firefox()
driver.get("http://localhost/project_list.php")
wait = WebDriverWait(driver, timeout=10)
assert "Liste des projets" in driver.title

elem = driver.find_element_by_id("project-backlog")
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Liste des US" in driver.title

elem = driver.find_element_by_id("add_user_story_link")
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Création d'une user stroy" in driver.title

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
elem.send_keys("description test")

elem = driver.find_element(By.XPATH, '//form')
elem.submit()

wait = WebDriverWait(driver, timeout=10)
driver.get("http://localhost/project_list.php")
wait = WebDriverWait(driver, timeout=10)
assert "Liste des projets" in driver.title

elem = driver.find_element_by_id("project-backlog")
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Liste des US" in driver.title
elems = driver.find_elements_by_css_selector("li")
assert len(elems) > 0

driver.close()
