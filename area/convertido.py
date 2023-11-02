import math
def imprimir_color_amarillo(mensaje):
    """
    https://python-para-impacientes.blogspot.com/2016/09/dar-color-las-salidas-en-la-consola.html
    Función que imprime un mensaje del usuario en color amarillo.
    Cuándo se trata de funciones para manipular el aspecto, es posible permitirles las impresiones internas.
    @param: string      Mensaje del usuario.
    """
    print("\x1b[1;33m" + mensaje)

def imprimir_color_morado(mensaje):
    """
    https://python-para-impacientes.blogspot.com/2016/09/dar-color-las-salidas-en-la-consola.html
    Función que imprime un mensaje del usuario en color amarillo.
    Cuándo se trata de funciones para manipular el aspecto, es posible permitirles las impresiones internas.
    @param: string      Mensaje del usuario.
    """
    print("\033[4;35m"+ mensaje) 
    
def es_numero(texto=""):
    
    """
    Función que devuelve si un texto representa un número o no.
    https://www.w3schools.com/python/ref_string_isnumeric.asp
    -1 para no es número, y 1 para sí es número.
    @param: texto   Representa o no un número, incluso valida el vacío.
    @return: Real   1 o -1.
    """
    
    salida = 1
    
    if texto.isnumeric() == False:
        salida = "Porfavor ingrese un numero gracias"
        
#archivo lleno de errores, si lo puedes agreglar te dare las gracias 
    return imprimir_color_morado(salida)

def Circulo():
    
    """
    Fucnion para calcular el area de un cuadrado
    @param float el radio del cuadro que se desea calcular
    """
    r = input("ingrese el radio: ")
    if es_numero(r) == 1:
        ra = int(r)
        salida = ra**2
        salida = salida * math.pi
        return salida
    print( es_numero(r))
    

def converidor():
    
    """
    Fucnion para convertir de dolares a pesos 
    segun la opcin que el ususario escoja
    """
    
    menu = input("1 de dolarEs/cc, 2 de cc/dolarEs, -1 salir :")
    t = input("digite la casa de cambio: ")
    
    
    if menu == "1":
        v1 = input("ingrese dolares: ")
        print(es_numero(v1))
        valor= float(v1)
        cambio = int(v1)
        print("Pesos colombianos"),print(valor * cambio)
    if menu == "2":
        v1 = input("ingrese el peso: ")
        print(es_numero(v1))
        valor= float(v1)
        cambio = int(v1)
        print("Dolares"),print(valor / cambio)
    print(es_numero(t))
    print(es_numero(menu))
    
"""
Funcion del menu es un simple menu
"""
def menu():
    opc = "1" 
    while opc !="0":
        print(imprimir_color_amarillo(opc))
        opc = input("0.salir 1 continuar. 2 radio: ")
        if opc == "1":
            converidor()
        if opc == "2": 
            print("El radio del circulo es",Circulo())
        print(es_numero(opc))
print(menu())

 


