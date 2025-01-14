program prt_4;
uses
    crt;
var
    width, length ,area : Real;
function rectangle(width, length:Real):Real;
var
    recarea : Real;
begin
    recarea := width * length;
    rectangle := recarea;
end;

begin
    ClrScr;
    Write('Input Width >>> ');
    ReadLn(width);
    Write('Input Length >>> ');
    ReadLn(length);
    Write('Rectangle Area is ',rectangle(width,Length):0:2);
    ReadLn;
end.