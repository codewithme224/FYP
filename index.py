# simple calculator in python

# accept input from user
# sourcery skip: avoid-builtin-shadow
num1 = input("Enter first number: ")
num2 = input("Enter second number: ")

# add two numbers
sum = float(num1) + float(num2)

# display the sum
print("The sum of {0} and {1} is {2}".format(num1, num2, sum))


# a function that performs addition, subtraction, multiplication and division
def calculator():
    print("Select operation.")
    print("1.Add")
    print("2.Subtract")
    print("3.Multiply")
    print("4.Divide")
    # Take input from the user
    choice = input("Enter choice(1/2/3/4): ")
    num1 = int(input("Enter first number: "))
    num2 = int(input("Enter second number: "))
    if choice == '1':
        print(num1, "+", num2, "=", (num1 + num2))
    elif choice == '2':
        print(num1, "-", num2, "=", (num1 - num2))
    elif choice == '3':
        print(num1, "*", num2, "=", (num1 * num2))
    elif choice == '4':
        print(num1, "/", num2, "=", (num1 / num2))
    else:
        print("Invalid input")