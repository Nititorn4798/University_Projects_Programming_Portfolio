program HelloWorld;
uses crt;

(* Here the main program block starts *)
begin
  { Formatting output }
  clrscr;

  WriteLn(9999);

  { write(number : fieldwidth); }
  WriteLn(9999:10);

  { write(number : fieldwidth : precision); }
  WriteLn(9999.9999:10:2);
  WriteLn(9999.9999:10:1);
end. 