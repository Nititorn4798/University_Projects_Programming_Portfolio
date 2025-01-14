program prt_39;
uses
  crt;
var
  num : Real = 0;
  total : Real = 0;
  i : Integer = 0;
begin
  ClrScr;
  repeat
    Write('Input Number [',i+1,'/10] : ');
    ReadLn(num);
    total := total + num;
    i := i + 1;
  until (i = 10);
  WriteLn('   Sum is ',total:0:2);
  ReadLn;
end.