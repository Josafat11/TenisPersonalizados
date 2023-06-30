<div>
  <h2>Administrasion de usuarios</h2>
  <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit eos nobis
    aut aspernatur cumque nam velit, sequi reiciendis hic quae beatae dolorem
    molestiae officiis? Accusantium, molestiae ducimus. Dolores, quas sequi.
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi, facilis
    iusto tempore ipsam numquam exercitationem officiis architecto.
    Exercitationem dolor vitae, omnis dolorum libero odit sint amet. Nam ipsum
    unde asperiores! Lorem ipsum dolor sit amet consectetur adipisicing elit.
    Aperiam pariatur eveniet distinctio ut iusto corporis aliquam, dolor
    deserunt hic porro voluptates in officiis officia, quae nemo assumenda
    totam, unde reprehenderit
  </p>
  <p>
    <a href="">Agregar nuevo usuario</a>
  </p>
  <!--Aqui va una tabla con los usuarios-->
  <table border=1>
    <thead>
      <td>Nombre</td>
      <td>A Paterno</td>
      <td>A Materno</td>
      <td>Usuario</td>
      <td>Acciones</td>
    </thead>
    <tbody>
      <?php
      foreach($datos as $dato){
        echo "<tr>";
        echo "<td>" . $dato['Nombre'] . "</td>";
        echo "<td>" . $dato['ApPaterno'] . "</td>";
        echo "<td>" . $dato['ApMaterno'] . "</td>";
        echo "<td>" . $dato['Usuario'] . "</td>";
        echo "<td> <a href=''>Eliminar</a> <br /> <a href=''>Editar</a> </td>";
        echo "</tr>";
      }
      ?>
      
    </tbody>
  </table>
</div>
