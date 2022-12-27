<%@ page session="true" contentType="text/html; charset=ISO-8859-1" %>
<%@ taglib uri="http://www.tonbeller.com/jpivot" prefix="jp" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jstl/core" %>


<jp:mondrianQuery id="query01" jdbcDriver="com.mysql.jdbc.Driver" 
jdbcUrl="jdbc:mysql://localhost/dwo_multidimensi5?user=root&password=" catalogUri="/WEB-INF/queries/dwdwo_eli_2.xml">

select {[Measures].[ReceivedQty]} ON COLUMNS,
  {([Product],[ShipMethod],[Vendor],[Time])} ON ROWS
from [fact_purchase]


</jp:mondrianQuery>





<c:set var="title01" scope="session">Query Data Warehouse Pembelian using Mondrian OLAP</c:set>