program HotelProgram;
uses
  crt;
var 
  a : array[1..100,1..100] of String;
begin
  a[9][999] := 'SS';
  WriteLn(a[9][999])
end.