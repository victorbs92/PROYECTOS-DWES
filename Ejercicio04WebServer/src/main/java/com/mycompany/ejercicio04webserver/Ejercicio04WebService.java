/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.ejercicio04webserver;

import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

/**
 *
 * @author admin
 */
@WebService(serviceName = "Ejercicio04WebService")
public class Ejercicio04WebService {

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
    @WebMethod(operationName = "tresLibros")
    public String tresLibros(@WebParam(name = "libro1") String libro1, @WebParam(name = "libro2") String libro2, @WebParam(name = "libro3") String libro3) {
        //TODO write your implementation code here:
        String resultado = "";

        resultado = libro1 + ", " + libro2 + ", " + libro3;

        return resultado;
    }
}
