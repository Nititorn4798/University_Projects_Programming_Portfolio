program prt_38;
uses
  crt;
var
  Sum : Integer = 0;
  i : Integer = 1;
begin
  repeat
    WriteLn(Sum, ' + ', i ,' = ', Sum + i);
    Sum := Sum + i;
    i := i + 1 ;
    Delay(101-i); //DELAY In Millisec 
  until (i = 101);
  WriteLn('OR (n(n+1)/2) = ',(100*(100+1)/2):0:2 );
  ReadLn;
end.