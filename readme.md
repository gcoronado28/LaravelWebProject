<h4>Desarrollo Web I - Trabajo Final</h4>

Su cliente necesita desarrollar una aplicación web para la facturación y control de inventarios de su local de comidas
rápidas. El acceso al sistema debe estar controlado por nombre de usuario y contraseña.

- El sistema debe permitir el registro y actualización de los ingredientes y platos que ofrece el restaurante. Los ingredientes
tienen los siguientes atributos:

| Tabla: Ingrediente |
| -- |

| Campo | Tipo |
| -- | -- |
| Codigo | Int Autonumérico |
| Nombre | Char(50) |
| Proveedor | Char(50) |

- Los platos disponibles en el menú están compuestos de ingredientes y tienen la siguiente estructura:

| Tabla: Plato |
| -- |

| Campo | Tipo |
| -- | -- |
| Codigo | Int Autonumérico |
| Nombre | Char(50) |
| Valor | Double(Float) |

| Tabla: PlatoIngrediente |
| -- |

| Campo | Tipo |
| -- | -- |
| Id | Int Autonumérico |
| CodPlato | Int |
| CodIngrediente | Int |
| Cantidad | Double(Float) |

- El sistema también deberá permitir el registro y cierre de las órdenes de comida que se hagan. La estructura de la orden
es la siguiente:

| Tabla: Orden |
| -- |

| Campo | Tipo |
| -- | -- |
| Numero | Int Autonumérico |
| Fecha | Date |
| NumMesa | Int |
| Estado | Char(1) |


| Tabla: OrdenPlato |
| -- |

| Campo | Tipo |
| -- | -- |
| Id | Int Autonumérico |
| NumOrden | Int |
| CodPlato | Int |
| Cantidad | Int |
| Valor | Double(float) |

El cliente dispondrá de tablets para el acceso de los meseros al sistema, por lo que la aplicación debe ser adaptable a
diferentes tamaños de pantallas.

En conclusión, el sistema deberá tener las siguientes características:

**1. Interfaz de usuario amigable y responsive.**

**2. Controlar el acceso a usuarios pidiendo usuario y contraseña.**
El sistema debe mostrar una página de login para que el usuario ingrese su nombre de usuario y contraseña.
Solo los usuarios autenticados podrán acceder a las demás funcionalidades del sistema.

**3. Registro y Actualización de Ingredientes.**
Registrar nuevos ingredientes y actualizar los que ya existan en la base de datos.

**4. Registro y Actualización de Platos y los ingredientes asociados a él.**
Creación de los platos, y una vez creado, poder agregar los ingredientes que éstos platos llevan. Consultar platos
existentes y poder modificarles su nombre y poder agregar o quitar ingredientes que lleva.

**5. Registro y Actualización de Órdenes y los platos que llevan.**
Creación de órdenes e ingreso de los platos que realizan en una mesa. Cuando se registre una orden nueva, el
campo estado deberá tener de valor la letra N (mayúsculas). Las órdenes pueden actualizarse para agregar o
quitar platos. Solo puede existir una orden con Estado N por mesa al mismo tiempo.

**6. Cierre de Órdenes y Liquidación del Valor.**
Cuando los clientes de las comidas rápidas piden la cuenta, el mesero accederá esta opción y deberá ingresar el
número de mesa y el sistema debe mostrar los platos solicitados por la mesa y al hacer clic en el botón de cierre;
el estado de la cuenta deberá quedar con la letra C y deberá mostrarse el valor total a pagar (sumatoria del
atributo valor del modelo OrdenPlato).

**7. Listado de Ventas del día.**
Es un listado de todas las órdenes que se hicieron en el día, el valor total por orden, y el valor total del día. Éste
listado debe pedir solo la fecha de entrada.

**Requerimientos No Funcionales:**

- Lenguaje de programación debe ser PHP.
- La aplicación debe usar arquitectura MVC y Framework Laravel.
- Es requerido el uso de Eloquent ORM.
- Para el control de la base de datos es requerido el uso de migraciones.
- El motor de la base de datos debe ser MySQL
- Todos los campos de información son requeridos, realizar las validaciones del caso.
