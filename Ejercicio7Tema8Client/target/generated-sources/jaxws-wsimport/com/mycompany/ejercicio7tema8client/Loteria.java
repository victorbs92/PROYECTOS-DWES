
package com.mycompany.ejercicio7tema8client;

import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebResult;
import javax.jws.WebService;
import javax.xml.bind.annotation.XmlSeeAlso;
import javax.xml.ws.Action;
import javax.xml.ws.RequestWrapper;
import javax.xml.ws.ResponseWrapper;


/**
 * This class was generated by the JAX-WS RI.
 * JAX-WS RI 2.2.8
 * Generated source version: 2.2
 * 
 */
@WebService(name = "loteria", targetNamespace = "http://ejercicio7tema8server.mycompany.com/")
@XmlSeeAlso({
    ObjectFactory.class
})
public interface Loteria {


    /**
     * 
     * @param name
     * @return
     *     returns java.lang.String
     */
    @WebMethod
    @WebResult(targetNamespace = "")
    @RequestWrapper(localName = "hello", targetNamespace = "http://ejercicio7tema8server.mycompany.com/", className = "com.mycompany.ejercicio7tema8client.Hello")
    @ResponseWrapper(localName = "helloResponse", targetNamespace = "http://ejercicio7tema8server.mycompany.com/", className = "com.mycompany.ejercicio7tema8client.HelloResponse")
    @Action(input = "http://ejercicio7tema8server.mycompany.com/loteria/helloRequest", output = "http://ejercicio7tema8server.mycompany.com/loteria/helloResponse")
    public String hello(
        @WebParam(name = "name", targetNamespace = "")
        String name);

    /**
     * 
     * @param fecha
     * @return
     *     returns java.lang.String
     */
    @WebMethod
    @WebResult(targetNamespace = "")
    @RequestWrapper(localName = "mostrarLoteriaPorFecha", targetNamespace = "http://ejercicio7tema8server.mycompany.com/", className = "com.mycompany.ejercicio7tema8client.MostrarLoteriaPorFecha")
    @ResponseWrapper(localName = "mostrarLoteriaPorFechaResponse", targetNamespace = "http://ejercicio7tema8server.mycompany.com/", className = "com.mycompany.ejercicio7tema8client.MostrarLoteriaPorFechaResponse")
    @Action(input = "http://ejercicio7tema8server.mycompany.com/loteria/mostrarLoteriaPorFechaRequest", output = "http://ejercicio7tema8server.mycompany.com/loteria/mostrarLoteriaPorFechaResponse")
    public String mostrarLoteriaPorFecha(
        @WebParam(name = "fecha", targetNamespace = "")
        String fecha);

    /**
     * 
     * @return
     *     returns java.lang.String
     */
    @WebMethod
    @WebResult(targetNamespace = "")
    @RequestWrapper(localName = "mostrarLoteria", targetNamespace = "http://ejercicio7tema8server.mycompany.com/", className = "com.mycompany.ejercicio7tema8client.MostrarLoteria")
    @ResponseWrapper(localName = "mostrarLoteriaResponse", targetNamespace = "http://ejercicio7tema8server.mycompany.com/", className = "com.mycompany.ejercicio7tema8client.MostrarLoteriaResponse")
    @Action(input = "http://ejercicio7tema8server.mycompany.com/loteria/mostrarLoteriaRequest", output = "http://ejercicio7tema8server.mycompany.com/loteria/mostrarLoteriaResponse")
    public String mostrarLoteria();

    /**
     * 
     * @param numero
     * @return
     *     returns java.lang.String
     */
    @WebMethod
    @WebResult(targetNamespace = "")
    @RequestWrapper(localName = "guardarLoteria", targetNamespace = "http://ejercicio7tema8server.mycompany.com/", className = "com.mycompany.ejercicio7tema8client.GuardarLoteria")
    @ResponseWrapper(localName = "guardarLoteriaResponse", targetNamespace = "http://ejercicio7tema8server.mycompany.com/", className = "com.mycompany.ejercicio7tema8client.GuardarLoteriaResponse")
    @Action(input = "http://ejercicio7tema8server.mycompany.com/loteria/guardarLoteriaRequest", output = "http://ejercicio7tema8server.mycompany.com/loteria/guardarLoteriaResponse")
    public String guardarLoteria(
        @WebParam(name = "numero", targetNamespace = "")
        int numero);

}
