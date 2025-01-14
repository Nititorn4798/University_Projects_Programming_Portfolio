program HotelProgram;
uses
  crt;
var
  room : array[1..5,1..9] of String;
  roomNumber : Integer;
  idcardNumber : String[13];
  menuSelect : Integer;
  inputRoomF, inputRoomR : Integer;
  firstTime : Boolean = True;
begin
ClrScr;
  repeat
    WriteLn('       +-------------------+');
    WriteLn('       |       Menu        |');
    WriteLn('       +-------------------+');
    WriteLn('       |  1. Check In      |');
    WriteLn('       |  2. Check Out     |');
    WriteLn('       |  3. Exit          |');
    WriteLn('       +-------------------+');
    Write  ('Select >>> ');
    readLn(menuSelect);
    if menuSelect = 1 then
      begin
        WriteLn('--  Room reservation system  --');
        repeat
          Write('Enter the room number [11-59] [0] To Exit >>> ');
          readLn(roomNumber);
          if roomNumber = 0 then
          begin
            ClrScr;
            break;
          end
          else
          begin
            inputRoomF := roomNumber div 10;
            inputRoomR := roomNumber mod 10;
            if ((inputRoomF < 1) or (inputRoomF > 5)) or ((inputRoomR < 1) or (inputRoomR > 9)) then
            begin
              WriteLn('Error Room!')
            end
            else
            begin
              if room[inputRoomF][inputRoomR] = '' then
              begin
                Write('Enter your ID card number. >>> ');
                readln(idcardNumber);
                if Length(idcardNumber) <> 13 then
                  WriteLn('   Please Check your ID card number !')
                else
                begin
                  room[inputRoomF][inputRoomR] := idcardNumber;
                  ClrScr;
                  WriteLn('Room ', inputRoomR, ' On Floor ', inputRoomF);
                  WriteLn('Successfully reserved a room.');
                  Write(#13#10);
                  firstTime := False;
                  Break
                end;
              end
              else
              begin
                ClrScr;
                WriteLn('This room is not available.');
                Write(#13#10);
              end;
            end;
          end;

        until False;
      end
    else if menuSelect = 2 then
      begin
        if firstTime = False then
        begin
          WriteLn('--  Room Checked out system  --');
          repeat
            Write('Enter the room number [11-59] [0] To Exit >>> ');
            readLn(roomNumber);
            if roomNumber = 0 then
            begin
              ClrScr;
              break;
            end
            else
            begin
              inputRoomF := roomNumber div 10;
              inputRoomR := roomNumber mod 10;
              if ((inputRoomF < 1) or (inputRoomF > 5)) or ((inputRoomR < 1) or (inputRoomR > 9)) then
              begin
                WriteLn('Error Room!')
              end
              else
              begin
                if room[inputRoomF][inputRoomR] <> '' then
                begin
                  Write('Enter your ID card number. >>> ');
                  readln(idcardNumber);
                  if idcardNumber = room[inputRoomF][inputRoomR] then
                  begin
                    ClrScr;
                    WriteLn('Room ', inputRoomR, ' On Floor ', inputRoomF);
                    room[inputRoomF][inputRoomR] := '';
                    WriteLn('Successfully checked out the room.');
                    Write(#13#10);
                    Break;
                  end
                  else
                    WriteLn('   Cant Check Out. Please Check your ID card number !');
                end
                else
                begin
                  ClrScr;
                  WriteLn('This room is already vacant. (Cant be Check out)');
                  Write(#13#10);
                end;
              end;
            end;
          until False;
        end
        else
        begin
          ClrScr;
          WriteLn('There are currently no rooms reserved.');
          Write(#13#10);
        end;
      end
    else if menuSelect = 3 then
      begin
        WriteLn('Exit Program!');
        WriteLn('By Nititorn Nantasin CS65003263019');
        Break;
      end
    else
      WriteLn('Menu Error!');
  until False;
end.