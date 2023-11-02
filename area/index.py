import math

def AreaDeCudaraado(a,b):
    return a *b
#---------despliegueDelPrograma----------#
a = int(input("Ingresa : "))
p = input("Ingresa:")

#print(AreaDeCudaraado(a,b))
#funcion para saber el area de un triangulo
def Triangulo(b,a):
    salida = 0
    salida = b*a/2
    return salida
#---------DespliegueDeTriangulo-----##
#print(Triangulo(2,5))

#fucniooDeCirculo
def Circulo(r):#
    salida = r**2
    salida = salida * math.pi
    return salida
#---depliegue------#
#print(Circulo(r))

#funcion de validar 
def validar(e):
    if e>=18:
        return "Eres un vijo sabroso"
    else:
        return "Eres un crio"
#----despliegue-------#
##print(validar(e))
#fromato 12/24
def harario12(a):
    if a>= 13:
        return a - 12,"pm"
    return a,"am"
#print(harario12(a))

def horario24(a,p):
    if a<=12:
        if p == "pm":
            return a +12,"pm"
        if p == "am":
            return a,"am"
        
print(horario24(a,p))