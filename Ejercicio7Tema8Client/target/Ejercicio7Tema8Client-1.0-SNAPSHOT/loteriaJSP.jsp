<%-- 
    Document   : loteriaJSP
    Created on : 18-feb-2021, 9:19:28
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
	com.mycompany.ejercicio7tema8client.Loteria_Service service = new com.mycompany.ejercicio7tema8client.Loteria_Service();
	com.mycompany.ejercicio7tema8client.Loteria port = service.getLoteriaPort();
	// TODO process result here
	java.lang.String result = port.mostrarLoteria();
	out.println("Result = "+result);
    } catch (Exception ex) {
	// TODO handle custom exceptions here
    }
    %>
    <%-- end web service invocation --%><hr/>
    </body>
</html>
