import math#libreria para que funcione la funcionCirculo
#----------FucnionColores---------------#
def imprimir_colores(mensaje,ban):
    """
    https://python-para-impacientes.blogspot.com/2016/09/dar-color-las-salidas-en-la-consola.html
    Función que imprime un mensaje del usuario en color amarillo.
    Cuándo se trata de funciones para manipular el aspecto, es posible permitirles las impresiones internas.
    @param: string      Mensaje del usuario.
    """
    if ban == 1:
        print("\x1b[1;33m" + mensaje)#lo que permite cambiar el color
    if ban == 2:
        print("\033[4;35m"+ mensaje) #lo que permite cambiar el color
    if ban == 3:
        print("\033[4;35;47m"+ mensaje +'\033[0;m') 

#-----------FucionParaDetectarTexto----------#
def es_numero(texto=""):
    
    """
    Función que devuelve si un texto representa un número o no.
    https://www.w3schools.com/python/ref_string_isnumeric.asp
    -1 para no es número, y 1 para sí es número.
    @param: texto   Representa o no un número, incluso valida el vacío.
    @return: Real   1 o -1.
    """
    
    salida = texto#para que salida retorne el valor ingresado
    
    if texto.isnumeric() == False:
        salida = imprimir_colores("Porfavor ingrese un numero gracias",2)
        #mensaje de error en caso de que llegue a ser texto 
    return salida
#----------FuncionCalcularElCirculo-----------#
def Circulo():
    
    """
    Fucnion para calcular el area de un cuadrado
    @param float el radio del cuadro que se desea calcular
    """
    r = input("ingrese el radio: ")#boton para que ingrese el radio del circulo 
    print(es_numero(r))#verifca si no es texto
    ra = int(r)#pasa el texto a numero
    salida = ra**2#operacion
    salida = salida * math.pi#operacion
    return salida #retona la salida
#----FuncionDeConversion------#
def converidor():
    """
    Fucnion para convertir de dolares a pesos 
    segun la opcin que el ususario escoja
    """  
    menu = input("1 de dolarEs/cc, 2 de cc/dolarEs: ")#el menu para que funcione la funcion Convertidor
    print(es_numero(menu))#para verificar que no sea texto
    t = input("digite la casa de cambio: ")#la tasa actual 
    print(es_numero(t))#para verificar que no sea texto
    
    if menu == "1":
        v1 = input("ingrese dolares: ")#el usuario ingresa el valor deseado
        print(es_numero(v1))#se verifica que no sea un numero 
        valor= int(v1)#el valor obtenido se convierte a numero
        cambio = int(t)# la tasa actual pasa a ser numerica
        print("Pesos colombianos"),print(valor * cambio) #se realiza la operacion y se imprime 
    if menu == "2":
        v1 = input("ingrese el peso: ")#el usuario ingresa el valor deseado
        print(es_numero(v1))#se verifica que no sea un numero 
        valor= int(v1)#el valor obtenido se convierte a numero
        cambio = int(t)# la tasa actual pasa a ser numerica
        print("Dolares"),print(valor / cambio) #se realiza la operacion y se imprime 
#------------MenuParaQueTodaEstaMierdaFuncione-------------------#
def menu():
    opc = "1" #se inicializa el menu
    while opc !="0":
        opc = input(imprimir_colores("0.salir 1 continuar. 2 radio: ",1))
        #se crea un bootn donde el usuario uusario tiene que elijir una de esas opciones
        #cabe haclara que la funcion imprimir_color_amarillo es para que sea de color amarillo
        print(es_numero(opc))#se verifica que no sea texto
        if opc == "1":
            converidor()
        if opc == "2": 
            print("El radio del circulo es",Circulo())
#------despliegue---------#
print(menu())
