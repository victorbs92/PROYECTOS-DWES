/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.tema08;

import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

/**
 *
 * @author admin
 */
@WebService(serviceName = "Ejercicio02")
public class Ejercicio02 {

    /**
     * Web service operation
     */
    @WebMethod(operationName = "calculadora")
    public String calculadora(@WebParam(name = "a") float a, @WebParam(name = "operacion") String operacion, @WebParam(name = "b") float b) {
        //TODO write your implementation code here:
        switch (operacion) {
            case "+": {
                return Float.toString(a + b);
            }
            case "-": {
                return Float.toString(a - b);
            }
            case "*": {
                return Float.toString(a * b);
            }
            case "/": {
                return Float.toString(a / b);
            }
            default: {
                return ("ERROR");
            }

        }

    }
}
