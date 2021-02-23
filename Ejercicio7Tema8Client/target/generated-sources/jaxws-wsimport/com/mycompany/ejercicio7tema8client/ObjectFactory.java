
package com.mycompany.ejercicio7tema8client;

import javax.xml.bind.JAXBElement;
import javax.xml.bind.annotation.XmlElementDecl;
import javax.xml.bind.annotation.XmlRegistry;
import javax.xml.namespace.QName;


/**
 * This object contains factory methods for each 
 * Java content interface and Java element interface 
 * generated in the com.mycompany.ejercicio7tema8client package. 
 * <p>An ObjectFactory allows you to programatically 
 * construct new instances of the Java representation 
 * for XML content. The Java representation of XML 
 * content can consist of schema derived interfaces 
 * and classes representing the binding of schema 
 * type definitions, element declarations and model 
 * groups.  Factory methods for each of these are 
 * provided in this class.
 * 
 */
@XmlRegistry
public class ObjectFactory {

    private final static QName _MostrarLoteria_QNAME = new QName("http://ejercicio7tema8server.mycompany.com/", "mostrarLoteria");
    private final static QName _GuardarLoteriaResponse_QNAME = new QName("http://ejercicio7tema8server.mycompany.com/", "guardarLoteriaResponse");
    private final static QName _GuardarLoteria_QNAME = new QName("http://ejercicio7tema8server.mycompany.com/", "guardarLoteria");
    private final static QName _MostrarLoteriaPorFecha_QNAME = new QName("http://ejercicio7tema8server.mycompany.com/", "mostrarLoteriaPorFecha");
    private final static QName _MostrarLoteriaPorFechaResponse_QNAME = new QName("http://ejercicio7tema8server.mycompany.com/", "mostrarLoteriaPorFechaResponse");
    private final static QName _Hello_QNAME = new QName("http://ejercicio7tema8server.mycompany.com/", "hello");
    private final static QName _MostrarLoteriaResponse_QNAME = new QName("http://ejercicio7tema8server.mycompany.com/", "mostrarLoteriaResponse");
    private final static QName _HelloResponse_QNAME = new QName("http://ejercicio7tema8server.mycompany.com/", "helloResponse");

    /**
     * Create a new ObjectFactory that can be used to create new instances of schema derived classes for package: com.mycompany.ejercicio7tema8client
     * 
     */
    public ObjectFactory() {
    }

    /**
     * Create an instance of {@link HelloResponse }
     * 
     */
    public HelloResponse createHelloResponse() {
        return new HelloResponse();
    }

    /**
     * Create an instance of {@link Hello }
     * 
     */
    public Hello createHello() {
        return new Hello();
    }

    /**
     * Create an instance of {@link MostrarLoteriaResponse }
     * 
     */
    public MostrarLoteriaResponse createMostrarLoteriaResponse() {
        return new MostrarLoteriaResponse();
    }

    /**
     * Create an instance of {@link MostrarLoteria }
     * 
     */
    public MostrarLoteria createMostrarLoteria() {
        return new MostrarLoteria();
    }

    /**
     * Create an instance of {@link GuardarLoteriaResponse }
     * 
     */
    public GuardarLoteriaResponse createGuardarLoteriaResponse() {
        return new GuardarLoteriaResponse();
    }

    /**
     * Create an instance of {@link GuardarLoteria }
     * 
     */
    public GuardarLoteria createGuardarLoteria() {
        return new GuardarLoteria();
    }

    /**
     * Create an instance of {@link MostrarLoteriaPorFecha }
     * 
     */
    public MostrarLoteriaPorFecha createMostrarLoteriaPorFecha() {
        return new MostrarLoteriaPorFecha();
    }

    /**
     * Create an instance of {@link MostrarLoteriaPorFechaResponse }
     * 
     */
    public MostrarLoteriaPorFechaResponse createMostrarLoteriaPorFechaResponse() {
        return new MostrarLoteriaPorFechaResponse();
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link MostrarLoteria }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://ejercicio7tema8server.mycompany.com/", name = "mostrarLoteria")
    public JAXBElement<MostrarLoteria> createMostrarLoteria(MostrarLoteria value) {
        return new JAXBElement<MostrarLoteria>(_MostrarLoteria_QNAME, MostrarLoteria.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link GuardarLoteriaResponse }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://ejercicio7tema8server.mycompany.com/", name = "guardarLoteriaResponse")
    public JAXBElement<GuardarLoteriaResponse> createGuardarLoteriaResponse(GuardarLoteriaResponse value) {
        return new JAXBElement<GuardarLoteriaResponse>(_GuardarLoteriaResponse_QNAME, GuardarLoteriaResponse.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link GuardarLoteria }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://ejercicio7tema8server.mycompany.com/", name = "guardarLoteria")
    public JAXBElement<GuardarLoteria> createGuardarLoteria(GuardarLoteria value) {
        return new JAXBElement<GuardarLoteria>(_GuardarLoteria_QNAME, GuardarLoteria.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link MostrarLoteriaPorFecha }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://ejercicio7tema8server.mycompany.com/", name = "mostrarLoteriaPorFecha")
    public JAXBElement<MostrarLoteriaPorFecha> createMostrarLoteriaPorFecha(MostrarLoteriaPorFecha value) {
        return new JAXBElement<MostrarLoteriaPorFecha>(_MostrarLoteriaPorFecha_QNAME, MostrarLoteriaPorFecha.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link MostrarLoteriaPorFechaResponse }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://ejercicio7tema8server.mycompany.com/", name = "mostrarLoteriaPorFechaResponse")
    public JAXBElement<MostrarLoteriaPorFechaResponse> createMostrarLoteriaPorFechaResponse(MostrarLoteriaPorFechaResponse value) {
        return new JAXBElement<MostrarLoteriaPorFechaResponse>(_MostrarLoteriaPorFechaResponse_QNAME, MostrarLoteriaPorFechaResponse.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link Hello }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://ejercicio7tema8server.mycompany.com/", name = "hello")
    public JAXBElement<Hello> createHello(Hello value) {
        return new JAXBElement<Hello>(_Hello_QNAME, Hello.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link MostrarLoteriaResponse }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://ejercicio7tema8server.mycompany.com/", name = "mostrarLoteriaResponse")
    public JAXBElement<MostrarLoteriaResponse> createMostrarLoteriaResponse(MostrarLoteriaResponse value) {
        return new JAXBElement<MostrarLoteriaResponse>(_MostrarLoteriaResponse_QNAME, MostrarLoteriaResponse.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link HelloResponse }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://ejercicio7tema8server.mycompany.com/", name = "helloResponse")
    public JAXBElement<HelloResponse> createHelloResponse(HelloResponse value) {
        return new JAXBElement<HelloResponse>(_HelloResponse_QNAME, HelloResponse.class, null, value);
    }

}
