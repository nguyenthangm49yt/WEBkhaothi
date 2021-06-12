@extends('CNdangkithi')
  <title>CN Đang ki thi </title>
  <link href="{{asset('/css/dangkithi.css')}}" rel="stylesheet" type="text/css" />
  
</head>
@section('content')
<body>
<!-- thong tin dot thi -->
  <div id="noidungstt{{$dotthi->ma}}" class="noidungstt">
          <div
              style="width: 100%; overflow-x: scroll;overflow-y: scroll;border-style: solid; border-width: 1px;padding-left: 1px; padding-right: 1px; padding-top: 1px; padding-bottom: 1px">
              <fieldset>
                  <legend><b>Thông tin Đợt thi</b></legend><br>
                  <table width="100%" style="font-family: Times New Roman; font-size: 16pt" cellpading="0"
                      cellspacing="0">
                      <tbody>
                          <tr>
                              <td width="12%" height="32">Mã Đợt thi : </td>
                              <td width="13%"> <input type="textbox" name="MaKythi" value="{{$dotthi->ma}}"
                                      style="height:28;font-size: 12pt" size="10" readonly="readonly"></td>

                              <td width="11%">Tên Đợt thi :</td>
                              <td colspan="4"> <input type="textbox" name="Tenkythi{{$dotthi->id}}"
                                      value="{{$dotthi->name}}"
                                      style="height:28;width:100%;font-size: 12pt" readonly="readonly"></td>

                          </tr>
                          <tr></tr>
                          <td height="32">Ngày thi từ : </td>
                          <td>
                              <input type="Text" name="Tungay" value="{{$dotthi->ngay_bat_dau}}"
                                  style="width: 147px; height:28;font-size: 12pt" size="25" readonly="readonly">
                          </td>
                          <td>Tới ngày : </td>
                          <td width="13%"><input type="Text" name="Toingay" value="{{$dotthi->ngay_ket_thuc}}"
                                  style="width: 147px; height:28;font-size: 12pt" size="25" readonly="readonly"></td>
                          <td width="23%">
                              Hạn đăng ký : <input type="TEXT" name="Handangky" value="{{$dotthi->han_dang_ki}}"
                                  style="width: 147px; height:28;font-size: 12pt" size="25" readonly="readonly"></td>
                          <td width="10%">Trạng thái:</td>
                          <td> <select size="1" name="Trangthaikythi" disabled="" 
                                  style="font-size:12pt;height:27px;width:100%">

                                 
                                  <option value="0" > ----- </option>
                                  <option value="0" {{($dotthi->status == "open") ? "selected" :"" }}> 0 - Mở đăng ký </option>
                                  <option value="1" {{($dotthi->status === 'close') ? "selected" :"" }}> 1 - Đóng đăng ký </option>
                                  <option value="2" {{($dotthi->status === 'finished') ? "selected" :"" }}> 2 - Đã thi </option>
                                  <option value="4" {{($dotthi->status === 'cancelled') ? "selected" :"" }}> 4 - Đã hủy </option>
                                  <option value="3" {{($dotthi->status === 'closeupdate') ? "selected" :"" }}> 3 - Đóng cập nhật </option>

                                 
                              </select> </td>
                          </tr>
                          <tr>
                              <td height="32">Mô tả Đợt thi: </td>
                              <td colspan="6"> <textarea rows="2" name="MotaKythi" style="width:100%;font-size: 12pt"
                                      readonly="readonly">{{$dotthi->mo_ta}}</textarea></td>
                          </tr>
                      </tbody>
                  </table>

                  <table width="100%" style="font-family: Times New Roman; font-size: 16pt">
                      <tbody>
                          <tr height="0">
                              <td width="10%" align="center">
                              </td>
                              <td width="5%" align="center"></td>
                              <td width="5%"></td>
                              <td width="5%"></td>
                              <td width="5%" align="center"></td>
                              <td width="5%"></td>
                              <td width="5%"></td>
                              <td width="5%" align="center"></td>
                              <td width="5%"></td>
                              <td width="5%"></td>
                              <td width="5%" align="center"></td>
                              <td width="5%"></td>
                              <td width="5%"></td>
                          </tr>
                          <tr height="32">
                              <td>Thời gian ca thi:</td>

                              @foreach($cathis as $cathi)
                              <td align="right">{{$cathi->ten}}:</td>
                              <td> <input type="text" name="ngay{{$cathi->ten}}" id="ngay{{$cathi->ten}}" value="{{$cathi->ngay}}" readonly="readonly"
                                      size="8" style="text-align: center;"> </td>
                              <td><input type="text" name="gio{{$cathi->ten}}" id="gio{{$cathi->ten}}" value="{{$cathi->gio}}" readonly="readonly"
                                      style="text-align: center;font-family: Times New Roman; font-size: 12pt" size="6">
                              </td>

                              @endforeach
                              
                          </tr>
                      </tbody>
                  </table>
              </fieldset>
          </div>
    </div>
    
    <br>
    <!-- chọn địa điểm thi và ca thi -->
    <form action="{{route('dangkithi.updatestore', ['id' => $dotthi->id]) }}" method="post" >
        {{ csrf_field()}} 
        <div id="ddthi" class="dd-thi">
            <div>
                <fieldset>
                    <legend><b>Chọn địa điểm thi - Ca thi (mỗi Đợt thi chỉ được chọn 1 điểm thi với các ca thi(dự kiến) được phép tại điểm thi đó)</b></legend><br>
                    <table  width="100%" border="1px" ; cellpading="0" cellspacing="0">
                        <thead>
                        <tr>
                            <th width="90px">Mã</th>
                            <th width="270px">Tên(Điểm thi/Bài thi)</th>
                            <th width="630px">Chọn ca thi</th>
                            <th width="90px">Lệ phí</th>

                        </tr>

                    
                        </thead>
                        <tbody>
                            <!-- điểm thi -->
                            @foreach($diemthis as $diemthi)
                        <tr class="ddiemthi">
                                <td colspan="4">
                                    <div>
                                        @if($hosoduthi[0]->id_diemthi === $diemthi->id)
                                        <input type="radio" onclick="btndiemthiclick()" name="ckdiemthi" value="{{$diemthi->id}}" checked > {{$diemthi->ma}}
                                        @else
                                        <input type="radio" onclick="btndiemthiclick()" name="ckdiemthi" value="{{$diemthi->id}}"  > {{$diemthi->ma}}
                                        @endif

                                        <b>{{$diemthi->ten}}( địa chỉ: {{$diemthi->dia_chi}} - tối đa 20 thí sinh)
                                        </b>
                                        </br>    
                                    </div>
                                <!-- các bài thi trong điểm     -->
                                <ul class ='ulbaithi'>
                                
                                @foreach($baithis as $key => $baithi)
                                <li >
                                    <ul class ='ulbaithidetail'>
                                             <li>
                                              
                                           
                                             
                                                <input type="checkbox" onclick='btnbaithiclick()' name="ckbaithi[]" value="{{$baithi->id}}" disabled 
                                                {{ in_array($baithi->id, $baithichecked ) ? 'checked' : '' }}
                                                >
                                              

                                              
                                                <label for="Ma">{{$baithi->ma}}</label>
                                            </li>       
                                            <li>{{$baithi->ten}}</li>
                                            
                                            <li>
                                            <ul>

                                                @foreach($cathichecked as $cathi)
                                                <li> 

                                                    {{$cathi->ten}}<input type="radio" name="ckcathi[{{$baithi->id}}]" value="{{$cathi->id_cathi}}" disabled 
                                                                {{  ($cathi->id_baithi == $baithi->id) && ($cathi->id_diemthi == $diemthi->id) ? 'checked' : '' }} >
                                                </li>
                                                @endforeach
                                            </ul>
                                            </li>
                                        
                                            <li>{{$baithi->le_phi}}</li>
                                            <br/>
                                    </ul>
                                </li>
                           
                                @endforeach
                                </ul>
                                </td>
                            </tr>
                            @endforeach
                        

                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
        @if ($errors->has('ckdiemthi'))
        <div>
            {{$errors->first('ckdiemthi')}}
            </div>
        @endif
        @if ($errors->has('ckbaithi'))
        <div>
            {{$errors->first('ckbaithi')}}
            </div>
        @endif
        @if ($errors->has('ckcathi'))
        <div>
            {{$errors->first('ckcathi')}}
            </div>
        @endif
            
        <button type="submit" style="height:27px;font-size:12pt;font-weight:bold;width:120pt" class="button2">
                            Ghi Nhận
        </button>
 
    </form>

    <!-- javascript -->
    <script>
    //    xử lí disable, enable khi click vào button
        function btndiemthiclick(){
            var button_diemthi = document.getElementsByName("ckdiemthi");
            var x = document.getElementsByClassName("ulbaithi");
          
            for(var i=0; i< x.length; i++){
                var button_baithi = x[i].querySelectorAll('input[name="ckbaithi[]"]');
                var button_cathi = x[i].querySelectorAll('input[type="radio"]');  
                    if(x[i].parentNode.childNodes[1].childNodes[1].checked){
                        
                        for(var j=0; j< button_baithi.length; j++){
                            button_baithi[j].disabled   = false;
                        }
                      
                    }
                    else{
                        
                     
                        for(var j=0; j< button_baithi.length; j++){
                            button_baithi[j].disabled   = true;
                            button_baithi[j].checked   = false;
                           
                        }
                        for(var j=0; j< button_cathi.length; j++){
                          button_cathi[j].disabled   = true;
                          button_cathi[j].checked   = false;
                         }
                      
                   
                    }
            }
       }

       function btnbaithiclick(){

        var x = document.getElementsByClassName("ulbaithidetail");

         
          for(var i=0; i< x.length; i++){
              var button_cathi = x[i].querySelectorAll('input[type="radio"]');
                
                  if(x[i].querySelector('input[name="ckbaithi[]"]').checked){
                      
                      for(var j=0; j< button_cathi.length; j++){
                          button_cathi[j].disabled   = false;
                      }
                    
                  }
                  else{
                      
                   
                      for(var j=0; j< button_cathi.length; j++){
                          button_cathi[j].disabled   = true;
                          button_cathi[j].checked   = false;
                      }
                    
                 
                  }
          }
       }

    
    

    </script>
    <script>
   
    var button_diemthi = document.getElementsByName("ckdiemthi");
            var x = document.getElementsByClassName("ulbaithi");
          
            for(var i=0; i< x.length; i++){
                var button_baithi = x[i].querySelectorAll('input[name="ckbaithi[]"]');
                var button_cathi = x[i].querySelectorAll('input[type="radio"]');  
                    if(x[i].parentNode.childNodes[1].childNodes[1].checked){
                        
                        for(var j=0; j< button_baithi.length; j++){
                            button_baithi[j].disabled   = false;
                        }
                      
                    }
                    else{
                        
                     
                        for(var j=0; j< button_baithi.length; j++){
                            button_baithi[j].disabled   = true;
                            button_baithi[j].checked   = false;
                           
                        }
                        for(var j=0; j< button_cathi.length; j++){
                          button_cathi[j].disabled   = true;
                          button_cathi[j].checked   = false;
                         }
                      
                   
                    }
            }
    </script>


    <script>
        var x = document.getElementsByClassName("ulbaithidetail");        
        for(var i=0; i< x.length; i++){
            var button_cathi = x[i].querySelectorAll('input[type="radio"]');
            
                if(x[i].querySelector('input[name="ckbaithi[]"]').checked){
                    
                    for(var j=0; j< button_cathi.length; j++){
                        button_cathi[j].disabled   = false;
                    }
                
                }
                else{
                    
                
                    for(var j=0; j< button_cathi.length; j++){
                        button_cathi[j].disabled   = true;
                        button_cathi[j].checked   = false;
                    }
                
            
                }
        }
    </script>
</body>
@endsection