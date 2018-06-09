<div class="container">
    <h3>Note : CIDR</h3>
</div>

<div class="container">
    <br/>
    <p>This page is a quote from <a href="https://cmdref.net/network/ip.html" target="_blank">https://cmdref.net/network/ip.html</a>
    </p>

    <br/>
    <br/>

    <table class="table table-striped table-bordered" style="width: auto;">
        <thead>
        <tr>
            <th style="width:80px;">CIDR</th>
            <th style="width:200px;">Mask</th>
            <th style="width:150px;">Hosts</th>
            <th style="width:250px;">the number of available host</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>/32</td>
            <td>255.255.255.255</td>
            <td>1</td>
            <td>-</td>
        </tr>
        <tr class="row2">
            <td class="col0">/31</td>
            <td class="col1">255.255.255.254</td>
            <td class="col2">2</td>
            <td class="col3">0</td>
        </tr>
        <tr class="row3">
            <td class="col0">/30</td>
            <td class="col1">255.255.255.252</td>
            <td class="col2">4</td>
            <td class="col3">2</td>
        </tr>
        <tr class="row4">
            <td class="col0">/29</td>
            <td class="col1">255.255.255.248</td>
            <td class="col2">8</td>
            <td class="col3">6</td>
        </tr>
        <tr class="row5">
            <td class="col0">/28</td>
            <td class="col1">255.255.255.240</td>
            <td class="col2">16</td>
            <td class="col3">14</td>
        </tr>
        <tr class="row6">
            <td class="col0">/27</td>
            <td class="col1">255.255.255.224</td>
            <td class="col2">32</td>
            <td class="col3">30</td>
        </tr>
        <tr class="row7">
            <td class="col0">/26</td>
            <td class="col1">255.255.255.192</td>
            <td class="col2">64</td>
            <td class="col3">62</td>
        </tr>
        <tr class="row8">
            <td class="col0">/25</td>
            <td class="col1">255.255.255.128</td>
            <td class="col2">128</td>
            <td class="col3">126</td>
        </tr>
        <tr class="row9">
            <td class="col0"><strong>/24</strong></td>
            <td class="col1 leftalign"><strong>255.255.255.0</strong></td>
            <td class="col2">256</td>
            <td class="col3">254</td>
        </tr>
        <tr class="row10">
            <td class="col0">/23</td>
            <td class="col1">255.255.254.0</td>
            <td class="col2">512</td>
            <td class="col3">510</td>
        </tr>
        <tr class="row11">
            <td class="col0">/22</td>
            <td class="col1">255.255.252.0</td>
            <td class="col2">1,024</td>
            <td class="col3">1,022</td>
        </tr>
        <tr class="row12">
            <td class="col0">/21</td>
            <td class="col1">255.255.248.0</td>
            <td class="col2">2,048</td>
            <td class="col3">2,046</td>
        </tr>
        <tr class="row13">
            <td class="col0">/20</td>
            <td class="col1">255.255.240.0</td>
            <td class="col2">4,096</td>
            <td class="col3">4,094</td>
        </tr>
        <tr class="row14">
            <td class="col0">/19</td>
            <td class="col1">255.255.224.0</td>
            <td class="col2">8,192</td>
            <td class="col3">8,190</td>
        </tr>
        <tr class="row15">
            <td class="col0"><strong>/16</strong></td>
            <td class="col1 leftalign"><strong>255.255.0.0</strong></td>
            <td class="col2">131,072</td>
            <td class="col3">131,070</td>
        </tr>
        <tr class="row16">
            <td class="col0 leftalign"><strong>/8</strong></td>
            <td class="col1"><strong>255.0.0.0</strong></td>
            <td class="col2">16,777,216</td>
            <td class="col3">16,777,214</td>
        </tr>
        </tbody>
    </table>


    <br/>

    <table class="table table-striped table-bordered" style="width: auto;">
        <tr class="row0">
            <td class="col0 leftalign"> /23</td>
            <td class="col1 leftalign"> /24</td>
            <td class="col2 leftalign"> /25</td>
            <td class="col3 leftalign"> /26</td>
            <td class="col4 leftalign"> /27</td>
            <td class="col5 leftalign"> /28</td>
            <td class="col6 leftalign"> /29</td>
            <td class="col7 leftalign"> /30</td>
        </tr>
        <tr class="row1">
            <td class="col0 leftalign"> 255.255.254.0</td>
            <td class="col1 leftalign"> 255.255.255.0</td>
            <td class="col2 leftalign"> 255.255.255.128</td>
            <td class="col3 leftalign"> 255.255.255.192</td>
            <td class="col4 leftalign"> 255.255.255.224</td>
            <td class="col5 leftalign"> 255.255.255.240</td>
            <td class="col6 leftalign"> 255.255.255.248</td>
            <td class="col7 leftalign"> 255.255.255.252</td>
        </tr>
        <tr class="row2">
            <td class="col0 leftalign"> 510</td>
            <td class="col1 leftalign"> 254</td>
            <td class="col2 leftalign"> 126</td>
            <td class="col3 leftalign"> 62</td>
            <td class="col4 leftalign"> 30</td>
            <td class="col5 leftalign"> 14</td>
            <td class="col6 leftalign"> 6</td>
            <td class="col7 leftalign"> 2</td>
        </tr>
        <tr class="row3">
            <td class="col0 leftalign" rowspan="16"> 10.1.0.0</td>
            <td class="col1 leftalign" rowspan="8"> 10.1.0.0</td>
            <td class="col2 leftalign" rowspan="4"> 10.1.0.0</td>
            <td class="col3 leftalign" rowspan="2"> 10.1.0.0</td>
            <td class="col4 leftalign"> 10.1.0.0</td>
            <td class="col5 leftalign"></td>
            <td class="col6 leftalign"></td>
            <td class="col7 leftalign"></td>
        </tr>
        <tr class="row4">
            <td class="col0 leftalign"> 10.1.0.32</td>
            <td class="col1 leftalign"></td>
            <td class="col2 leftalign"></td>
            <td class="col3 leftalign"></td>
        </tr>
        <tr class="row5">
            <td class="col0 leftalign" rowspan="2"> 10.1.0.64</td>
            <td class="col1 leftalign"> 10.1.0.64</td>
            <td class="col2 leftalign"></td>
            <td class="col3 leftalign"></td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row6">
            <td class="col0 leftalign"> 10.1.0.96</td>
            <td class="col1 leftalign"></td>
            <td class="col2 leftalign"></td>
            <td class="col3 leftalign"></td>
        </tr>
        <tr class="row7">
            <td class="col0 leftalign" rowspan="4"> 10.1.0.128</td>
            <td class="col1 leftalign" rowspan="2"> 10.1.0.128</td>
            <td class="col2 leftalign"> 10.1.0.128</td>
            <td class="col3 leftalign"></td>
            <td class="col4 leftalign"></td>
            <td class="col5 leftalign"></td>
        </tr>
        <tr class="row8">
            <td class="col0 leftalign"> 10.1.0.160</td>
            <td class="col1 leftalign"></td>
            <td class="col2 leftalign"></td>
            <td class="col3 leftalign"></td>
        </tr>
        <tr class="row9">
            <td class="col0 leftalign" rowspan="2"> 10.1.0.192</td>
            <td class="col1 leftalign"> 10.1.0.192</td>
            <td class="col2 leftalign"></td>
            <td class="col3 leftalign"></td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row10">
            <td class="col0 leftalign"> 10.1.0.224</td>
            <td class="col1 leftalign"></td>
            <td class="col2 leftalign"></td>
            <td class="col3 leftalign"></td>
        </tr>
        <tr class="row11">
            <td class="col0 leftalign" rowspan="8"> 10.1.1.0</td>
            <td class="col1 leftalign" rowspan="4"> 10.1.1.0</td>
            <td class="col2 leftalign" rowspan="2"> 10.1.1.0</td>
            <td class="col3 leftalign"> 10.1.1.0</td>
            <td class="col4 leftalign"></td>
            <td class="col5 leftalign"></td>
            <td class="col6 leftalign"></td>
        </tr>
        <tr class="row12">
            <td class="col0 leftalign"> 10.1.1.32</td>
            <td class="col1 leftalign"></td>
            <td class="col2 leftalign"></td>
            <td class="col3 leftalign"></td>
        </tr>
        <tr class="row13">
            <td class="col0 leftalign" rowspan="2"> 10.1.1.64</td>
            <td class="col1 leftalign"> 10.1.1.64</td>
            <td class="col2 leftalign"></td>
            <td class="col3 leftalign"></td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row14">
            <td class="col0 leftalign"> 10.1.1.96</td>
            <td class="col1 leftalign"></td>
            <td class="col2 leftalign"></td>
            <td class="col3 leftalign"></td>
        </tr>
        <tr class="row15">
            <td class="col0 leftalign" rowspan="4"> 10.1.1.128</td>
            <td class="col1 leftalign" rowspan="2"> 10.1.1.128</td>
            <td class="col2 leftalign"> 10.1.1.128</td>
            <td class="col3 leftalign"></td>
            <td class="col4 leftalign"></td>
            <td class="col5 leftalign"></td>
        </tr>
        <tr class="row16">
            <td class="col0 leftalign"> 10.1.1.160</td>
            <td class="col1 leftalign"></td>
            <td class="col2 leftalign"></td>
            <td class="col3 leftalign"></td>
        </tr>
        <tr class="row17">
            <td class="col0 leftalign" rowspan="2"> 10.1.1.192</td>
            <td class="col1 leftalign"> 10.1.1.192</td>
            <td class="col2 leftalign"></td>
            <td class="col3 leftalign"></td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row18">
            <td class="col0 leftalign"> 10.1.1.224</td>
            <td class="col1 leftalign"></td>
            <td class="col2 leftalign"></td>
            <td class="col3 leftalign"></td>
        </tr>
        <tr class="row19">
            <td class="col0 leftalign"> 10.1.2.0</td>
            <td class="col1 leftalign"> 10.1.2.0</td>
            <td class="col2 leftalign"></td>
            <td class="col3 leftalign"></td>
            <td class="col4 leftalign"></td>
            <td class="col5 leftalign"></td>
            <td class="col6 leftalign"></td>
            <td class="col7 leftalign"></td>
        </tr>
    </table>


    <table class="table table-striped table-bordered" style="width: auto;">
        <tr class="row0">
            <td class="col0 leftalign"></td>
            <td class="col1 leftalign"> /30</td>
            <td class="col2 leftalign"> /29</td>
            <td class="col3 leftalign"> /28</td>
            <td class="col4 leftalign"> /27</td>
        </tr>
        <tr class="row1">
            <td class="col0 leftalign"> 192.168.0.X</td>
            <td class="col1 leftalign"> 2</td>
            <td class="col2 leftalign"> 6</td>
            <td class="col3 leftalign"> 14</td>
            <td class="col4 leftalign"> 30</td>
        </tr>
        <tr class="row2">
            <td class="col0 leftalign"> 0</td>
            <td class="col1 leftalign"> the network itself</td>
            <td class="col2 leftalign"> the network itself</td>
            <td class="col3 leftalign"> the network itself</td>
            <td class="col4 leftalign"> the network itself</td>
        </tr>
        <tr class="row3">
            <td class="col0 leftalign"> 1</td>
            <td class="col1 leftalign"> host1</td>
            <td class="col2 leftalign"> host1</td>
            <td class="col3 leftalign"> host1</td>
            <td class="col4 leftalign"> host1</td>
        </tr>
        <tr class="row4">
            <td class="col0 leftalign"> 2</td>
            <td class="col1 leftalign"> host2</td>
            <td class="col2 leftalign"> host2</td>
            <td class="col3 leftalign"> host2</td>
            <td class="col4 leftalign"> host2</td>
        </tr>
        <tr class="row5">
            <td class="col0 leftalign"> 3</td>
            <td class="col1 leftalign"> broadcast address</td>
            <td class="col2 leftalign"> host3</td>
            <td class="col3 leftalign"> host3</td>
            <td class="col4 leftalign"> host3</td>
        </tr>
        <tr class="row6">
            <td class="col0 leftalign"> 4</td>
            <td class="col1 leftalign"> the network itself</td>
            <td class="col2 leftalign"> host4</td>
            <td class="col3 leftalign"> host4</td>
            <td class="col4 leftalign"> host4</td>
        </tr>
        <tr class="row7">
            <td class="col0 leftalign"> 5</td>
            <td class="col1 leftalign"> host1</td>
            <td class="col2 leftalign"> host5</td>
            <td class="col3 leftalign"> host5</td>
            <td class="col4 leftalign"> host5</td>
        </tr>
        <tr class="row8">
            <td class="col0 leftalign"> 6</td>
            <td class="col1 leftalign"> host2</td>
            <td class="col2 leftalign"> host6</td>
            <td class="col3 leftalign"> host6</td>
            <td class="col4 leftalign"> host6</td>
        </tr>
        <tr class="row9">
            <td class="col0 leftalign"> 7</td>
            <td class="col1 leftalign"> broadcast address</td>
            <td class="col2 leftalign"> the network itself</td>
            <td class="col3 leftalign"> host7</td>
            <td class="col4 leftalign"> host7</td>
        </tr>
        <tr class="row10">
            <td class="col0 leftalign"> 8</td>
            <td class="col1 leftalign"> the network itself</td>
            <td class="col2 leftalign"> the network itself</td>
            <td class="col3 leftalign"> host8</td>
            <td class="col4 leftalign"> host8</td>
        </tr>
        <tr class="row11">
            <td class="col0 leftalign"> 9</td>
            <td class="col1 leftalign"> host1</td>
            <td class="col2 leftalign"> host1</td>
            <td class="col3 leftalign"> host9</td>
            <td class="col4 leftalign"> host9</td>
        </tr>
        <tr class="row12">
            <td class="col0 leftalign"> 10</td>
            <td class="col1 leftalign"> host2</td>
            <td class="col2 leftalign"> host2</td>
            <td class="col3 leftalign"> host10</td>
            <td class="col4 leftalign"> host10</td>
        </tr>
        <tr class="row13">
            <td class="col0 leftalign"> 11</td>
            <td class="col1 leftalign"> broadcast address</td>
            <td class="col2 leftalign"> host3</td>
            <td class="col3 leftalign"> host11</td>
            <td class="col4 leftalign"> host11</td>
        </tr>
        <tr class="row14">
            <td class="col0 leftalign"> 12</td>
            <td class="col1 leftalign"> the network itself</td>
            <td class="col2 leftalign"> host4</td>
            <td class="col3 leftalign"> host12</td>
            <td class="col4 leftalign"> host12</td>
        </tr>
        <tr class="row15">
            <td class="col0 leftalign"> 13</td>
            <td class="col1 leftalign"> host1</td>
            <td class="col2 leftalign"> host5</td>
            <td class="col3 leftalign"> host13</td>
            <td class="col4 leftalign"> host13</td>
        </tr>
        <tr class="row16">
            <td class="col0 leftalign"> 14</td>
            <td class="col1 leftalign"> host2</td>
            <td class="col2 leftalign"> host6</td>
            <td class="col3 leftalign"> host14</td>
            <td class="col4 leftalign"> host14</td>
        </tr>
        <tr class="row17">
            <td class="col0 leftalign"> 15</td>
            <td class="col1 leftalign"> broadcast address</td>
            <td class="col2 leftalign"> broadcast address</td>
            <td class="col3 leftalign"> broadcast address</td>
            <td class="col4 leftalign"> host15</td>
        </tr>
        <tr class="row18">
            <td class="col0 leftalign"> 16</td>
            <td class="col1 leftalign"> the network itself</td>
            <td class="col2 leftalign"> the network itself</td>
            <td class="col3 leftalign"> the network itself</td>
            <td class="col4 leftalign"> host16</td>
        </tr>
        <tr class="row19">
            <td class="col0 leftalign"> 17</td>
            <td class="col1 leftalign"> host1</td>
            <td class="col2 leftalign"> host1</td>
            <td class="col3 leftalign"> host1</td>
            <td class="col4 leftalign"> host17</td>
        </tr>
        <tr class="row20">
            <td class="col0 leftalign"> 18</td>
            <td class="col1 leftalign"> host2</td>
            <td class="col2 leftalign"> host2</td>
            <td class="col3 leftalign"> host2</td>
            <td class="col4 leftalign"> host18</td>
        </tr>
        <tr class="row21">
            <td class="col0 leftalign"> 19</td>
            <td class="col1 leftalign"> broadcast address</td>
            <td class="col2 leftalign"> host3</td>
            <td class="col3 leftalign"> host3</td>
            <td class="col4 leftalign"> host19</td>
        </tr>
        <tr class="row22">
            <td class="col0 leftalign"> 20</td>
            <td class="col1 leftalign"> the network itself</td>
            <td class="col2 leftalign"> host4</td>
            <td class="col3 leftalign"> host4</td>
            <td class="col4 leftalign"> host20</td>
        </tr>
        <tr class="row23">
            <td class="col0 leftalign"> 21</td>
            <td class="col1 leftalign"> host1</td>
            <td class="col2 leftalign"> host5</td>
            <td class="col3 leftalign"> host5</td>
            <td class="col4 leftalign"> host21</td>
        </tr>
        <tr class="row24">
            <td class="col0 leftalign"> 22</td>
            <td class="col1 leftalign"> host2</td>
            <td class="col2 leftalign"> host6</td>
            <td class="col3 leftalign"> host6</td>
            <td class="col4 leftalign"> host22</td>
        </tr>
        <tr class="row25">
            <td class="col0 leftalign"> 23</td>
            <td class="col1 leftalign"> broadcast address</td>
            <td class="col2 leftalign"> broadcast address</td>
            <td class="col3 leftalign"> host7</td>
            <td class="col4 leftalign"> host23</td>
        </tr>
        <tr class="row26">
            <td class="col0 leftalign"> 24</td>
            <td class="col1 leftalign"> the network itself</td>
            <td class="col2 leftalign"> the network itself</td>
            <td class="col3 leftalign"> host8</td>
            <td class="col4 leftalign"> host24</td>
        </tr>
        <tr class="row27">
            <td class="col0 leftalign"> 25</td>
            <td class="col1 leftalign"> host1</td>
            <td class="col2 leftalign"> host1</td>
            <td class="col3 leftalign"> host9</td>
            <td class="col4 leftalign"> host25</td>
        </tr>
        <tr class="row28">
            <td class="col0 leftalign"> 26</td>
            <td class="col1 leftalign"> host2</td>
            <td class="col2 leftalign"> host2</td>
            <td class="col3 leftalign"> host10</td>
            <td class="col4 leftalign"> host26</td>
        </tr>
        <tr class="row29">
            <td class="col0 leftalign"> 27</td>
            <td class="col1 leftalign"> broadcast address</td>
            <td class="col2 leftalign"> host3</td>
            <td class="col3 leftalign"> host11</td>
            <td class="col4 leftalign"> host27</td>
        </tr>
        <tr class="row30">
            <td class="col0 leftalign"> 28</td>
            <td class="col1 leftalign"> the network itself</td>
            <td class="col2 leftalign"> host4</td>
            <td class="col3 leftalign"> host12</td>
            <td class="col4 leftalign"> host28</td>
        </tr>
        <tr class="row31">
            <td class="col0 leftalign"> 29</td>
            <td class="col1 leftalign"> host1</td>
            <td class="col2 leftalign"> host5</td>
            <td class="col3 leftalign"> host13</td>
            <td class="col4 leftalign"> host29</td>
        </tr>
        <tr class="row32">
            <td class="col0 leftalign"> 30</td>
            <td class="col1 leftalign"> host2</td>
            <td class="col2 leftalign"> host6</td>
            <td class="col3 leftalign"> host14</td>
            <td class="col4 leftalign"> host30</td>
        </tr>
        <tr class="row33">
            <td class="col0 leftalign"> 31</td>
            <td class="col1 leftalign"> broadcast address</td>
            <td class="col2 leftalign"> broadcast address</td>
            <td class="col3 leftalign"> broadcast address</td>
            <td class="col4 leftalign"> broadcast address</td>
        </tr>
        <tr class="row34">
            <td class="col0 leftalign"> abbr</td>
            <td class="col1 leftalign"> abbr</td>
            <td class="col2 leftalign"> abbr</td>
            <td class="col3 leftalign"> abbr</td>
            <td class="col4 leftalign"> abbr</td>
        </tr>
        <tr class="row35">
            <td class="col0 leftalign"> 240</td>
            <td class="col1 leftalign"> the network itself</td>
            <td class="col2 leftalign"> the network itself</td>
            <td class="col3 leftalign"> the network itself</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row36">
            <td class="col0 leftalign"> 241</td>
            <td class="col1 leftalign"> host1</td>
            <td class="col2 leftalign"> host1</td>
            <td class="col3 leftalign"> host1</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row37">
            <td class="col0 leftalign"> 242</td>
            <td class="col1 leftalign"> host2</td>
            <td class="col2 leftalign"> host2</td>
            <td class="col3 leftalign"> host2</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row38">
            <td class="col0 leftalign"> 243</td>
            <td class="col1 leftalign"> broadcast address</td>
            <td class="col2 leftalign"> host3</td>
            <td class="col3 leftalign"> host3</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row39">
            <td class="col0 leftalign"> 244</td>
            <td class="col1 leftalign"> the network itself</td>
            <td class="col2 leftalign"> host4</td>
            <td class="col3 leftalign"> host4</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row40">
            <td class="col0 leftalign"> 245</td>
            <td class="col1 leftalign"> host1</td>
            <td class="col2 leftalign"> host5</td>
            <td class="col3 leftalign"> host5</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row41">
            <td class="col0 leftalign"> 246</td>
            <td class="col1 leftalign"> host2</td>
            <td class="col2 leftalign"> host6</td>
            <td class="col3 leftalign"> host6</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row42">
            <td class="col0 leftalign"> 247</td>
            <td class="col1 leftalign"> broadcast address</td>
            <td class="col2 leftalign"> broadcast address</td>
            <td class="col3 leftalign"> host7</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row43">
            <td class="col0 leftalign"> 248</td>
            <td class="col1 leftalign"> the network itself</td>
            <td class="col2 leftalign"> the network itself</td>
            <td class="col3 leftalign"> host8</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row44">
            <td class="col0 leftalign"> 249</td>
            <td class="col1 leftalign"> host1</td>
            <td class="col2 leftalign"> host1</td>
            <td class="col3 leftalign"> host9</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row45">
            <td class="col0 leftalign"> 250</td>
            <td class="col1 leftalign"> host2</td>
            <td class="col2 leftalign"> host2</td>
            <td class="col3 leftalign"> host10</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row46">
            <td class="col0 leftalign"> 251</td>
            <td class="col1 leftalign"> broadcast address</td>
            <td class="col2 leftalign"> host3</td>
            <td class="col3 leftalign"> host11</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row47">
            <td class="col0 leftalign"> 252</td>
            <td class="col1 leftalign"> the network itself</td>
            <td class="col2 leftalign"> host4</td>
            <td class="col3 leftalign"> host12</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row48">
            <td class="col0 leftalign"> 253</td>
            <td class="col1 leftalign"> host1</td>
            <td class="col2 leftalign"> host5</td>
            <td class="col3 leftalign"> host13</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row49">
            <td class="col0 leftalign"> 254</td>
            <td class="col1 leftalign"> host2</td>
            <td class="col2 leftalign"> host6</td>
            <td class="col3 leftalign"> host14</td>
            <td class="col4 leftalign"></td>
        </tr>
        <tr class="row50">
            <td class="col0 leftalign"> 255</td>
            <td class="col1 leftalign"> broadcast address</td>
            <td class="col2 leftalign"> broadcast address</td>
            <td class="col3 leftalign"> broadcast address</td>
            <td class="col4 leftalign"></td>
        </tr>
    </table>


</div>


<!-- ================================================================================== -->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
