package com.company;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import java.util.concurrent.TimeUnit;

public class Main {

    public static void main(String[] args) throws InterruptedException {
        System.setProperty("webdriver.gecko.driver","C:\\Users\\Sethei\\Desktop\\M05_Selenium\\geckodriver.exe");
        //Test del login
        WebDriver driver = new FirefoxDriver();
        driver.get("http://cendrahouse.com/login");
        driver.manage().window().maximize();
        driver.findElement(By.id("email")).sendKeys("dani.delgado@gmail.com");
        driver.findElement(By.id("password")).sendKeys("12345678");
        Thread.sleep(3000);
        driver.manage().timeouts().implicitlyWait(60, TimeUnit.SECONDS);
        driver.findElement(By.id("login")).click();
        //Test Crear un tipus de propietat
        driver.get("http://cendrahouse.com/admin/types/0");
        driver.findElement(By.id("name")).sendKeys("Tipus_Prova");
        driver.findElement(By.id("icon")).sendKeys("<i class=\"fab fa-fort-awesome\"></i>");
        Thread.sleep(3000);
        driver.findElement(By.id("save")).click();
    }
}
