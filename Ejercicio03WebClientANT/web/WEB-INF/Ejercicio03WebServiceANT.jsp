<%-- 
    Document   : Ejercicio03WebServiceANT
    Created on : 24-feb-2021, 10:17:55
    Author     : admin
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Hello World!</h1>
        
    <%-- start web service invocation --%><hr/>
    <%
    try {
	com.mycompany.ejercicio03server.Ejercicio03WebService_Service service = new com.mycompany.ejercicio03server.Ejercicio03WebService_Service();
	com.mycompany.ejercicio03server.Ejercicio03WebService port = service.getEjercicio03WebServicePort();
	 // TODO initialize WS operation arguments here
	int a = 0;
	int b = 0;
	int c = 0;
	// TODO process result here
	java.lang.String result = port.mediaAritmetica(a, b, c);
	out.println("Result = "+result);
    } catch (Exception ex) {
	// TODO handle custom exceptions here
    }
    %>
    <%-- end web service invocation --%><hr/>
    </body>
</html>
