<table border="0" width="100%" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
    <td style="padding: 5px 0 5px 0;" align="center" bgcolor="#4D82B8"><img style="display: block;" src="{{ $message->embed('images/empresa.png') }}" alt="Empresa" width="90" height="50" /></td>
    </tr>
    <tr>
    <td style="padding: 40px 30px 40px 30px;" bgcolor="#ffffff">
    <table border="1" width="100%" cellspacing="0" cellpadding="10">
    <tbody>
    <tr>
    <td style="color: #ffffff; background-color: #FFE600; font-family: Arial, sans-serif; font-size: 24px; text-align: center;"><strong>{TRIGGER.NAME}</strong></td>
    </tr>
    <tr>
    <td style="color: #153643; background-color: #FFC70F; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><strong>Acknowledgement: </strong>{ACK.MESSAGE}</td>
    </tr>
    <tr>
    <td style="color: #153643; background-color: #FFC70F; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><strong>Acknowledgement Time: </strong>{ACK.DATE}</td>
    </tr>
    <tr>
    <td style="color: #153643; background-color: #FFC70F; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><strong>Trigger status: </strong>{TRIGGER.STATUS}</td>
    </tr>
    <tr>
    <td style="color: #153643; background-color: #FFC70F; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><strong>Trigger severity: </strong>{TRIGGER.SEVERITY}</td>
    </tr>
    <tr>
    <td style="color: #153643; background-color: #FFC70F; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><strong>Start time:</strong> {EVENT.DATE} - {EVENT.TIME}</td>
    </tr>
    <tr>
    <td style="color: #153643; background-color: #FFC70F; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><strong>Host:</strong> {HOST.NAME1} - ({HOST.DNS1}, {HOST.IP1})</td>
    </tr>
    <tr>
    <td style="color: #153643; background-color: #FFC70F; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><strong>Host description: </strong>{HOST.DESCRIPTION1}</td>
    </tr>
    <tr>
    <td style="color: #153643; background-color: #FFC70F; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><strong>Trigger Description: </strong>{TRIGGER.DESCRIPTION}</td>
    </tr>
    <tr>
    <td style="color: #153643; background-color: #FFC70F; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><strong>Value: </strong>{ITEM.VALUE1}</td>
    </tr>
    <tr>
    <td style="color: #153643; background-color: #FFC70F; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><strong>Original event ID: </strong>{EVENT.ID}</td>
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
    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">&reg; Empresa, {{ date('Y') }}</td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>