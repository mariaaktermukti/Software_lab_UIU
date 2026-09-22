from selenium import webdriver
from selenium.webdriver.edge.service import Service
from selenium.webdriver.common.by import By

# To Keep Browser Open Indefinitely
options = webdriver.EdgeOptions()
options.add_experimental_option("detach", True)

# Edge Driver
service_obj = Service()
driver = webdriver.Edge(options=options, service=service_obj)

# Browser Tasks
driver.maximize_window()
driver.get("http://rahulshettyacademy.com/angularpractice/")
#------------------------------------------------------------

# Locator -> ID, CLASS_NAME, NAME, XPATH, CSSSelector, Link
#data send
driver.find_element(By.CLASS_NAME, "form-control").send_keys("Mukti") #class name
driver.find_element(By.NAME,"email").send_keys("mukti@gmail.com")
driver.find_element(By.ID, "exampleInputPassword1").send_keys("12345")

#click
driver.find_element(By.ID, "exampleCheck1").click()
#-----------
#ager password ta clear kora lagbe, na hole ager password er sathe eita concate hbe
driver.find_element(By.XPATH, "//input[@id='exampleInputPassword1']").clear()

#password-> XPATH //input[@type='password']
driver.find_element(By.XPATH, "//input[@id='exampleInputPassword1']").send_keys("67890")
#-----------------------------------------------------------------------------------------
# CSSSelector -> tagname[attribute='value']
# Password -> tagname[attribute='value']
driver.find_element(By.ID, "exampleInputPassword1").clear()  # Clears field
driver.find_element(By.CSS_SELECTOR, "input[type='password']").send_keys("1111")
#---------------------------------------------------------------------------
# Indexing / Hierarchy
# XPATH -> //input[@type='text'] -> 3 Components (Name, Email, Last Box)
driver.find_element(By.XPATH, "(//input[@type='text'])[1]").clear()
driver.find_element(By.XPATH, "(//input[@type='text'])[1]").send_keys("Tom")  # 1-Indexed
driver.find_element(By.XPATH, "(//input[@type='text'])[2]").clear()
driver.find_element(By.XPATH, "(//input[@type='text'])[2]").send_keys("tom@gmail.com")

#-----------------------------------------------------------
# Drop-Down
driver.find_element(By.ID, "exampleFormControlSelect1").send_keys("Female")

#-----------------------------------------------------------
#link
#driver.find_element(By.LINK_TEXT, "Shop").click()

#-----------------------------------------------------------
#confirmation
driver.find_element(By.CLASS_NAME, "btn").click()

msg= driver.find_element(By.CLASS_NAME,"alert").text
print(msg)

#--------------------------------------
#assert function
assert "Success" in msg