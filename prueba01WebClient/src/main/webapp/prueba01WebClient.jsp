<%-- 
    Document   : prueba01WebClient
    Created on : 24-feb-2021, 4:54:29
    Author     : victo
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
	com.mycompany.prueba01webserver.Prueba01WebService_Service service = new com.mycompany.prueba01webserver.Prueba01WebService_Service();
	com.mycompany.prueba01webserver.Prueba01WebService port = service.getPrueba01WebServicePort();
	 // TODO initialize WS operation arguments here
	java.lang.String name = "asd";
	// TODO process result here
	java.lang.String result = port.hello(name);
	out.println("Result = "+result);
    } catch (Exception ex) {
	// TODO handle custom exceptions here
    }
    %>
    <%-- end web service invocation --%><hr/>
    </body>
</html>
