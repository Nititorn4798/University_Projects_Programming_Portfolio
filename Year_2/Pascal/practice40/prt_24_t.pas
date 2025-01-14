program prt_24_t;
uses
  crt;
var
  Sale , Price : Integer; 
  C10 , C5 : Integer;

begin
  ClrScr;
  Write('Input Price : ');
  ReadLn(Price);
  Sale := Price div 10;
  C10 := Sale div 10;
  C5 := (Sale mod 10) div 5;
  Write(' Sale = ');
  Write(Sale);
  Write(' C10 = ');
  Write(C10);
  Write(' C5 = ');
  Write(C5);
  ReadLn;
end.
