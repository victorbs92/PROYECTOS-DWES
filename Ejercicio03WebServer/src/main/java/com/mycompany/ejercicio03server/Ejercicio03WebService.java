/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.ejercicio03server;

import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

/**
 *
 * @author admin
 */
@WebService(serviceName = "Ejercicio03WebService")
public class Ejercicio03WebService {

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
    @WebMethod(operationName = "mediaAritmetica")
    public String mediaAritmetica(@WebParam(name = "a") int a, @WebParam(name = "b") int b, @WebParam(name = "c") int c) {
        //TODO write your implementation code here:
        String resultado = "";

        int aux = (a + b + c) / 3;

        resultado = Integer.toString(aux);

        return resultado;
    }
}
