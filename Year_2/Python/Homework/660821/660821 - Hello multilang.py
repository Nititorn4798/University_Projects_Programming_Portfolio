def main():
    def thailand():
        print("Thailand  สวัสดี ")
        def singapore():
            print("Singapore หนีห่าว")
            def laos():
                print("Laos      สะบายดี")
                def myanmar():
                    print("Myanmar   มิงกาลาบา")
                    def cambodia():
                        print("Cambodia  ซัวสเด")
                    cambodia()
                myanmar()
            laos()
        singapore()
    thailand()

print('\033c')
print("ยินดีต้อนรับสู่โปรแกรมแนะนำคำทักทายในประเทศอาเซียน")
main()