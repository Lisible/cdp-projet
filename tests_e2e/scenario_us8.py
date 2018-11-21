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
wait = webDriverWait(driver, timeout=10)
assert "Liste des projets" in driver.title

driver.close()
