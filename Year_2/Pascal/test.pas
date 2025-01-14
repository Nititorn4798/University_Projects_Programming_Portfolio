program grade_array ;
uses
    crt;
var
    code : array[1..5] of string[11];
    name : array[1..5] of string[50];
    age,Grade  : array[1..5] of integer;
    sex,status : array[1..5] of char;
    s   : array[1..5] of string[6];
    st,G   : array[1..5] of string[6];
    A : array[1..5] of integer;
    i : Integer;
    M : Integer;
    notok : Boolean = False;
    begin
        clrscr;
        write('code   :::> '); readln(code[1]);
        write('code   :::> '); readln(code[2]);
        write('code   :::> '); readln(code[3]);
        write('code   :::> '); readln(code[4]);
        write('code   :::> '); readln(code[5]);
        
        write('name   :::> '); readln(name[1]);
        write('name   :::> '); readln(name[2]);
        write('name   :::> '); readln(name[3]);
        write('name   :::> '); readln(name[4]);
        write('name   :::> '); readln(name[5]);
        
        repeat
        write('Input your age    :::> '); readln(age[1]);
        write('Input your age    :::> '); readln(age[2]);
        write('Input your age    :::> '); readln(age[3]);
        write('Input your age    :::> '); readln(age[4]);
        write('Input your age    :::> '); readln(age[5]);
        if ((age[1] <= 1) or (age[2] <= 1) or (age[3] <= 1) or (age[4] <= 1) or (age[5] <= 1)) or ((age[1] >= 120) or (age[2] >= 120) or (age[3] >= 120) or (age[4] >= 120) or (age[5] >= 120)) then
            writeln ('- please enter your message again')
        else
        begin
          break
        end;
        until False;

        repeat
            write('sex    :::> '); readln(sex[1]);
            write('sex    :::> '); readln(sex[2]);
            write('sex    :::> '); readln(sex[3]);
            write('sex    :::> '); readln(sex[4]);
            write('sex    :::> '); readln(sex[5]);
            
            for i := 1 to 5 do
                if not ((UpCase(sex[i]) = 'M') or (upcase(sex[i]) = 'F')) then
                begin
                    notok := True;
                end
                else
                begin
                  notok := False;
                end;

            if notok then
            writeln ('- please enter your message again');
        until not (notok); //true = exit

        // '''until ((sex='m')or (sex='M')or (sex='f')or (sex='F'));'''

        repeat
            write('Score  :::> ');readln(Grade[1]);
            write('Score  :::> ');readln(Grade[2]);
            write('Score  :::> ');readln(Grade[3]);
            write('Score  :::> ');readln(Grade[4]);
            write('Score  :::> ');readln(Grade[5]);
            for i := 1 to 5 do
                if not ((Grade[i]>=0) and (Grade[i]<=100)) then
                begin
                    notok := True;
                end
                else
                begin
                  notok := False;
                end;
            if notok then writeln ('- please enter your message again');
        until not (notok);
        
        for i:= 1 to 5 do
        begin
          if sex[i]='m' then 
              s[i]:='male'
          else if sex[i]='f' then 
              s[i]:='female';
        end;

        for i:= 1 to 5 do
        begin
        if      (Grade[i]>=80) and (Grade[i]<=100)then G[i]:='A'
        else if (Grade[i]>=75) and (Grade[i]<=79) then G[i]:='B+'
        else if (Grade[i]>=70) and (Grade[i]<=74) then G[i]:='B'
        else if (Grade[i]>=65) and (Grade[i]<=69) then G[i]:='C+'
        else if (Grade[i]>=60) and (Grade[i]<=64) then G[i]:='C'
        else if (Grade[i]>=55) and (Grade[i]<=59) then G[i]:='D+'
        else if (Grade[i]>=50) and (Grade[i]<=54) then G[i]:='D'
        else if (Grade[i]>=0)  and (Grade[i]<=49) then G[i]:='F';
        end;

        writeln('How many people do you want to see? (1-5) ');
        writeln('answer : ');readln(M);
        case M of
          1:
          begin
              writeln('-----------------------------------------------------------');
              writeln('     code            name          age     sex     Grade  ');
              writeln('-----------------------------------------------------------');
              writeln(' ',code[1]:5,'    ',name[1]:12,'      ',age[1]:2,' ',s[1]:7,'' ,G[1]:10,'');
          end;
          2:
          begin
              writeln('-----------------------------------------------------------');
              writeln('     code            name          age     sex     Grade  ');
              writeln('-----------------------------------------------------------');
              writeln(' ',code[2]:5,'    ',name[2]:12,'      ',age[2]:2,' ',s[2]:7,'' ,G[2]:10,'');
          end;
          3:
          begin
              writeln('-----------------------------------------------------------');
              writeln('     code            name          age     sex     Grade  ');
              writeln('-----------------------------------------------------------');
              writeln(' ',code[3]:5,'    ',name[3]:12,'      ',age[3]:2,' ',s[3]:7,'' ,G[3]:10,'');
          end;
          4:
          begin
              writeln('-----------------------------------------------------------');
              writeln('     code            name          age     sex     Grade  ');
              writeln('-----------------------------------------------------------');
              writeln(' ',code[4]:5,'    ',name[4]:12,'      ',age[4]:2,' ',s[4]:7,'' ,G[4]:10,'');
          end;
          5:
          begin
              writeln('-----------------------------------------------------------');
              writeln('     code            name          age     sex     Grade  ');
              writeln('-----------------------------------------------------------');
              writeln(' ',code[5]:5,'    ',name[5]:12,'      ',age[5]:2,' ',s[5]:7,'' ,G[5]:10,'');
          end;
        end;
        for i:= 1 to m do
          begin
              writeln('-----------------------------------------------------------');
              writeln('     code            name          age     sex     Grade  ');
              writeln('-----------------------------------------------------------');
              writeln(' ',code[i]:5,'    ',name[i]:12,'      ',age[i]:2,' ',s[i]:7,'' ,G[i]:10,'');
          end;
        readln ;
    end.