import time
from pyvirtualdisplay import Display
from selenium import webdriver
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait

print("teste2e for US14 starting... ")

display = Display(visible=0, size=(800, 600))
display.start()

driver = webdriver.Firefox()
driver.get("http://localhost/index.php")
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
elem = driver.find_element(By.XPATH, '//a[@href=\"disconnect.php\"]')
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Index" in driver.title

print("teste2e for US14: done.")
driver.close()
