program flow_Queue;
uses
     crt;
var sum,n1,n2,n3 : integer;
    sum1 : real;
    i,z : char;
    h : integer;
begin
     repeat    
          clrscr;
          writeln('***************************');
          writeln('********* MENU **********');
          writeln('******* 1. Push *********');
          writeln('******* 2. Pop  *********');
          writeln('******* 3. Exit *********');
          writeln('***** Select number *****');
          writeln('***************************');
          f:=5;
          C:=1;
          R:=0;
          readln(i);
          case i of
          1:
          begin
               repeat
                    writeln(' Set the time to F = 5. ');
                    writeln(' To add 1, press Y. To finish, press N.');readln(z);
                    if(z='y') or (z='Y') then writeln('Error information');
                         begin
                         f:=f+c;
                         write('Show F value',F);
                         end
                    else if (z='N')or (z='n') then
                         begin
                              writeln('end of work');
                              Exit;
                         end
                    writeln('To start over, press 1. To end work, press 0.');read(h);
               until h = 0;
          end;
               
          2:
          begin
               repeat
                    writeln('Let R be equal to F, which has a value equal to 5.');
                    writeln('To add 1, press Y. To finish, press N.');readln(n);
                    if(n='y') or (n='Y') then writeln('Error information');
                         begin
                         R:=f;
                         R:R+c;
                         write('Show F value',R);
                         end
                    else if (n='N')or (n='n') then
                         begin
                              writeln('end of work');
                              Exit;
                         end
                    writeln('To start over, press 1. To end work, press 0.');read(h);
               until h = 0;
          end; 
          readln;     
     until(i=3)
end.