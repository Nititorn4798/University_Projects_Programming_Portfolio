from datetime import datetime
# pylint: disable=missing-module-docstring
# pylint: disable=missing-class-docstring
# pylint: disable=missing-function-docstring
class super_intelligent_stock_system_in2024:
    product = {}
    product_id = 0
    product_detail = ''
    product_price = 0
    product_amount = 0
    product_last_access = ''
    def __init__(self,username):
        self.user = username

    def check_product_id(self,mode='code'):
        while True:
            print('\n-------------------------\n')
            self.product_id = input('Input Product ID That You Want To Query >>> ')
            if self.product_id not in self.product:
                print('Your Product ID IS Not Correct!!!')
            else:
                if mode in ['code']:
                    return 'product_id_ok'
                if mode in ['returnvalue']:
                    return self.product_id

    def secure_input(self,string_x,mode='int_chk'):
        while True:
            temp = input(string_x)
            if mode in ['int_chk']:
                if temp.isdigit() is True:
                    return int(temp)
                else:
                    print('Value Error Try Again. ')
            elif mode in ['float_chk']:
                def chk_float(numstr):
                    try:
                        float(numstr)
                        return True
                    except ValueError:
                        return False
                if chk_float(temp) is True:
                    return float(temp)
                else:
                    print('Value Error Try Again. ')
            else:
                if len(temp) > 0:
                    return temp
                else:
                    print('Value Error Try Again. ')

    def product_add(self):
        self.product_id = self.secure_input('Input Product ID >>> ','chk_len')
        while True:
            self.product_amount = self.secure_input('Input Product Amount >>> ')
            if self.product_amount <= 0:
                print('Value Error Try Again.')
            else:
                break
        self.product_price = self.secure_input('Input Product Price >>> ','float_chk')
        self.product_detail = self.secure_input('Input Product Detail >>> ','chk_len')
        now = datetime.now()
        dt_string = now.strftime("%d/%m/%Y %H:%M:%S")
        self.product_last_access = self.user

        self.product.update({
            self.product_id : {
                "product_amount" : self.product_amount,
                "product_price" : self.product_price,
                "product_detail" : self.product_detail,
                "product_last_access" : f'{self.product_last_access} at {dt_string}'
            }
        })

    def product_edit(self):
        while True:
            if self.check_product_id() in ['product_id_ok']:
                select_data = input('Select Data That You Want To Edit [product_amount = 1 , product_price = 2, product_detail = 3, exit = 4] \n\t>>> ')
                match select_data:
                    case "1" :
                        select_data = "product_amount"
                    case "2" :
                        select_data = "product_price"
                    case "3" :
                        select_data = "product_detail"
                    case "4" :
                        break
                    case _ :
                        print('Your Input Isnt Correct!!!')
                        select_data = '019x'
                if select_data not in ['019x']:
                    if select_data in ["product_amount"]:
                        self.product[self.product_id][select_data] = self.secure_input(f'Input Edit {select_data} >>> ')
                    if select_data in ["product_price"]:
                        self.product[self.product_id][select_data] = self.secure_input(f'Input Edit {select_data} >>> ','float_chk')
                    elif select_data in ["product_detail"]:
                        self.product[self.product_id][select_data] = self.secure_input(f'Input Edit {select_data} >>> ','chk_len')
                    now = datetime.now()
                    dt_string = now.strftime("%d/%m/%Y %H:%M:%S")
                    self.product[self.product_id]["product_last_access"] = f'{self.product_last_access} at {dt_string}'
                    if input('Do You Want To Edit Again ? [Y / N] >>> ') not in ['Y','y']:
                        break

    def product_viewdetail(self):
        query_id = self.check_product_id('returnvalue')
        print(self.product)
        print('\n-------------------------\n')
        print(f'Product ID : {query_id}')
        print(f'Product Amount : {self.product[query_id]["product_amount"]}')
        print(f'Product Price : {self.product[query_id]["product_price"]}')
        print(f'Product Detail : {self.product[query_id]["product_detail"]}')
        print(f'Product Last Access By : {self.product[query_id]["product_last_access"]}')

RUN = True
while RUN:
    while True:
        print('\n-------------------------\n')
        auth_name = input('Please confirm your identity. Input Your Name >>> ')
        if auth_name not in ['',' '] and len(auth_name) > 1:
            print(f'OK. Your Are "{auth_name}"')
            stocksystem_a = super_intelligent_stock_system_in2024(auth_name)
            break
        else:
            print('Invalid name Please enter again.')

    while True:
        STOCK_AMOUNT = len(stocksystem_a.product)
        print('\n-------------------------\n')
        print('Choose the desired operation')
        print('1. Add Product To Stock')
        if STOCK_AMOUNT > 0 :
            print('2. Edit Product')
            print('3. Show Product')
        print('4. Logout')
        print('5. Exit')
        menu = input('\t>>> ')
        match menu:
            case '1':
                stocksystem_a.product_add()
            case '2':
                stocksystem_a.product_edit()
            case '3':
                stocksystem_a.product_viewdetail()
            case '4':
                print('Log Out')
                break
            case '5':
                print('Exit By Nititorn Nantasin 65003263019')
                RUN = False
                break
