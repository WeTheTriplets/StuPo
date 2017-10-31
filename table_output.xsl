<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">


<html>
  <body>
  <h2> FORM Details </h2>
  
  <table border="1">
    <tr bgcolor="#73bba1">
      <th>form no</th>
      <th>student ID</th>
      <th>source station</th>
      <th>destination station</th>
      <th>route name</th>
      <th>class of travel</th>
      <th>duration</th>
      <th>pass from</th>
      <th>pass to</th>
      <th>previous pass</th>
      <th>address</th>
      <th>status</th>
    </tr>
    <xsl:for-each select="students/rail_form_detail">
    <tr>
      <td><xsl:value-of select="n"/></td>
      <td><xsl:value-of select="id"/></td>
      <td><xsl:value-of select="from"/></td>
      <td><xsl:value-of select="to"/></td>
      <td><xsl:value-of select="rn"/></td>
      <td><xsl:value-of select="cot"/></td>
      <td><xsl:value-of select="duration"/></td>
      <td><xsl:value-of select="pf"/></td>
      <td><xsl:value-of select="pt"/></td>
      <td><xsl:value-of select="pass"/></td>
      <td><xsl:value-of select="addr"/></td>
      <td><xsl:value-of select="st"/></td>
    </tr>
   </xsl:for-each>
  </table>


  </body>
  </html>
</xsl:template>
</xsl:stylesheet>



   
     
