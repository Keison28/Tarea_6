import unittest
from selenium import webdriver
import HtmlTestRunner
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys 
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.support import expected_conditions as EC
import time
import os




os.makedirs("capturas", exist_ok=True)

def screenshot(driver, nombre):
    driver.save_screenshot(f"capturas/{nombre}.png")

class TestCRUDPersonajes(unittest.TestCase):

    @classmethod
    def setUpClass(cls):
        ruta_driver = r"C:\Users\keison\Downloads\chromedriver-win32\chromedriver-win32\chromedriver.exe"
        service = Service(executable_path=ruta_driver)
        cls.driver = webdriver.Chrome(service=service)
        cls.driver.maximize_window()
        cls.driver.get("http://localhost/Tarea_6/login.php")
        global driver
        driver = webdriver.Chrome(service=service)
        
        

    def test_crud(self):
        driver = self.driver
        
        screenshot(driver, "01_login_pantalla")
        
        # Login
        user = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "input[name='user']")))
        user.clear()
        user.send_keys("20240228@itla.edu.do")
       
        

        password = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "input[name='pass']")))
        password.clear()
        password.send_keys("12345")
        
        screenshot(driver, "02_login_datos_ingresados")

        
       

        WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "a[name='login']"))).click()

        # Crear personaje
        
       
        WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.LINK_TEXT, "+ Agregar Personaje"))).click()
        WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.NAME, "nombre")))
        
        

        driver.find_element(By.NAME, "nombre").send_keys("Roronoa Zoro")
        driver.find_element(By.NAME, "color").send_keys("Verde")
        driver.find_element(By.NAME, "tipo").send_keys("Sub-capitan")
        driver.find_element(By.NAME, "nivel").send_keys("320000000")
        
        screenshot(driver, "03_personaje_datos_ingresados")


        time.sleep(1)
        
        WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "button[name='create']"))).click()
        WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "a[name='index']"))).click()

        screenshot(driver, "04_index_despues_crear")

        # Editar personaje
        WebDriverWait(driver, 10).until(
            EC.presence_of_element_located((By.XPATH, "//td[contains(text(),'Roronoa Zoro')]"))
        )
        
        time.sleep(1)
        
        driver.find_element(By.XPATH, "//td[contains(text(),'Roronoa Zoro')]/following-sibling::td//a[contains(text(),'Editar')]").click()

        color = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "input[name='color']")))
        color.clear()
        color.send_keys("Verde Marino")
        
        time.sleep(1)

        tipo = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "input[name='tipo']")))
        tipo.clear()
        tipo.send_keys("Espadachin")
        
        time.sleep(1)
        screenshot(driver, "05_personaje_editando")


        WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "button[name='edit']"))).click()
        WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "a[name='index']"))).click()

        screenshot(driver, "06_index_despues_editar")

        # Eliminar personaje
        WebDriverWait(driver, 10).until(
            EC.presence_of_element_located((By.XPATH, "//td[contains(text(),'Roronoa Zoro')]"))
        )
        
        time.sleep(2)
        
        driver.find_element(By.XPATH, "//td[contains(text(),'Roronoa Zoro')]/following-sibling::td//a[contains(text(),'Eliminar')]").click()

        time.sleep(2)
        
        WebDriverWait(driver, 2).until(EC.alert_is_present())
        driver.switch_to.alert.accept()
        
        time.sleep(2)

        WebDriverWait(driver, 5).until(EC.alert_is_present())
        driver.switch_to.alert.accept()
        screenshot(driver, "07_index_despues_eliminar")

    @classmethod
    def tearDownClass(cls):
        time.sleep(5)
        cls.driver.quit()

if __name__ == '__main__':
    unittest.main(
        testRunner=HtmlTestRunner.HTMLTestRunner(output='reportes_html', report_name='TestCRUD_Personajes', combine_reports=True),
        verbosity=2
    )
