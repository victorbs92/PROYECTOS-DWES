/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.ejercicio02webserver;

import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

/**
 *
 * @author admin
 */
@WebService(serviceName = "Ejercicio02WebService")
public class Ejercicio02WebService {

    /**
     * This is a sample web service operation
     */
    @WebMethod(operationName = "hello")
    public String hello(@WebParam(name = "name") String txt) {
        return "Hello " + txt + " !";
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "dosPalabras")
    public String dosPalabras(@WebParam(name = "palabra1") String palabra1, @WebParam(name = "palabra2") String palabra2) {
        //TODO write your implementation code here:
        return palabra1 + " " + palabra2;
    }
}
