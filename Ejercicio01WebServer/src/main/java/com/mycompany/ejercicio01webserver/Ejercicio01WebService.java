/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.ejercicio01webserver;

import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

/**
 *
 * @author admin
 */
@WebService(serviceName = "Ejercicio01WebService")
public class Ejercicio01WebService {

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
    @WebMethod(operationName = "areaTriangulo")
    public String areaTriangulo(@WebParam(name = "altura") int altura, @WebParam(name = "base") int base) {
        String resultado = "";
        
        int aux = (base * altura) / 2;
        
        resultado = Integer.toString(aux);
        
        return resultado;
    }
}
