<%@ page session="true" contentType="text/html; charset=ISO-8859-1" %>
<%@ taglib uri="http://www.tonbeller.com/jpivot" prefix="jp" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jstl/core" %>


<jp:mondrianQuery id="query01" jdbcDriver="com.mysql.jdbc.Driver" 
jdbcUrl="jdbc:mysql://localhost/dwo_multidimensi5?user=root&password=" catalogUri="/WEB-INF/queries/dwdwo_eli_1.xml">

select {[Measures].[OrderQty]} ON COLUMNS,
  {([Store],[Product],[ShipMethod],[Time])} ON ROWS
from [fact_sales]


</jp:mondrianQuery>





<c:set var="title01" scope="session">Query Data Warehouse Penjualan using Mondrian OLAP</c:set>