<table border="0" width="100%" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td style="padding: 5px 0 5px 0;" align="center" bgcolor="#4D82B8">
                <img style="display: block;" src="{{ $message->embed('images/logo.png') }}" alt="Solor Tecnologia" width="90" height="50"/>
            </td>
        </tr>
        <tr>
            <td style="padding: 40px 30px 40px 30px;" bgcolor="#ffffff">
                <table border="1" width="100%" cellspacing="0" cellpadding="10">
                    <tbody>
                        <tr>
                            <td style="color: #ffffff; background-color: #df0000; font-family: Arial, sans-serif; font-size: 24px; text-align: center;">
                                <strong>{{ $ms['triggername'] }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; background-color: #d95a5a; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                <strong>Trigger status: </strong>{{ $ms['triggerstatus'] }}
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; background-color: #d95a5a; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                <strong>Trigger severity: </strong>{{ $ms['triggerseverity'] }}
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; background-color: #d95a5a; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                <strong>Start time: </strong>{{ $ms['eventdate'] }} - {{ $ms['eventtime'] }}
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; background-color: #d95a5a; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                <strong>Host: </strong>{{ $ms['hostname'] }} - ({{ $ms['hostdns'] }}, {{ $ms['hostip'] }})
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; background-color: #d95a5a; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                <strong>Host description: </strong>{{ $ms['hostdescription'] }}
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; background-color: #d95a5a; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                <strong>Trigger Description: </strong>{{ $ms['triggerdescription'] }}
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; background-color: #d95a5a; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                <strong>Value: </strong>{{ $ms['itemvalue'] }}
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; background-color: #d95a5a; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                <strong>Original event ID: </strong>{{ $ms['eventid'] }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            <img src="{{ $message->embedData($graph, 'graph.png') }}">
            </td>
        </tr>
        <tr>
            <td style="padding: 10px 0 10px 0;" bgcolor="#4D82B8">
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
                                &reg; Solor Tecnologia, {{ date('Y') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>