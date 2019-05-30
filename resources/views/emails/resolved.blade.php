<table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <table align="center" border="1" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tr>
                    <td align="center" bgcolor="#4D82B8" style="padding: 5px 0 5px 0;">
                        <img src="{{ $message->embed('images/logo.png') }}" alt="Solor Tecnologia" width="90" height="50" style="display: block;" />
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                        <table border="1" cellpadding="10" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #ffffff; background-color: #4caf50; font-family: Arial, sans-serif; font-size: 24px; text-align: center"><b>{{ $ms['triggername'] }}</b></td>
                            </tr>
                            <tr>
                                <td style="color: #153643; background-color: #4caf5069; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><b>Trigger status: </b>{{ $ms['triggerstatus'] }}</td>
                            </tr>
                            <tr>
                                <td style="color: #153643; background-color: #4caf5069; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><b>Trigger severity: </b>{{ $ms['triggerseverity'] }}</td>
                            </tr>
                            <tr>
                                <td style="color: #153643; background-color: #4caf5069; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><b>Start time: </b>{{ $ms['eventdate'] }} - {{ $ms['eventtime'] }}</td>
                            </tr>
                            <tr>
                                <td style="color: #153643; background-color: #4caf5069; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><b>Closing time: </b>{{ $ms['eventrecoverydate'] }} - {{ $ms['eventrecoverytime'] }}</td>
                            </tr>
                            <tr>
                                <td style="color: #153643; background-color: #4caf5069; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><b>Trigger duration: </b>{{ $ms['eventage'] }}</td>
                            </tr>
                            <tr>
                                <td style="color: #153643; background-color: #4caf5069; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><b>Host: </b>{{ $ms['hostname'] }} - ({{ $ms['hostdns'] }}, {{ $ms['hostip'] }})</td>
                            </tr>
                            <tr>
                                <td style="color: #153643; background-color: #4caf5069; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><b>Host description: </b>{{ $ms['hostdescription'] }}</td>
                            </tr>
                            <tr>
                                <td style="color: #153643; background-color: #4caf5069; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><b>Trigger Description: </b>{{ $ms['triggerdescription'] }}</td>
                            </tr>
                            <tr>
                                <td style="color: #153643; background-color: #4caf5069; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><b>Value: </b>{{ $ms['itemvalue'] }}</td>
                            </tr>
                            <tr>
                                <td style="color: #153643; background-color: #4caf5069; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><b>Original event ID: </b>{{ $ms['eventid'] }}</td>
                            </tr>
                        </table>
                        <img src="{{ $message->embedData($graph, 'graph.png') }}">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#4D82B8" style="padding: 10px 0 10px 0;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">&reg; Solor Tecnologia, {{ date('Y') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </tr>
    </table>