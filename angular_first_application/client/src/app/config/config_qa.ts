export class Config {

  //-------------------------------------Do not comment this part --------------------------------------------------------
  public static readonly cxoRoles: Array<any> = ["Chief Financial Officer", "Chief Executive Officer", "Chief of Business", "Business Integrator- Corporate Systems Audit",
    "Chief People Officer", "Chief Technology Officer", "Chief Operating Officer", "Entrepreneur in Residence"];
//----------------------------------------------------------------------------------------------------------------------------------------




  public static readonly loginServiceHost: string = "https://qaaccount.callhealth.com";
  public static readonly sessionServiceHost: string = "https://qaaccount.callhealth.com";
  public static readonly myCompanyServiceHost: string = "https://knowledge.callhealth.com/dokuwiki/data/";
  public static readonly socketHost: string = "https://qaaccount.callhealth.com";
  public static readonly chatSocketHost: string = "https://qachat.callhealth.com";
  public static readonly phpService: string = "https://qaphpservice.callhealth.com/";
  public static readonly gatewayPhpService: string = "https://qaphpservice.callhealth.com";
  public static readonly gatewayDomain: string = "https://qaaccount.callhealth.com";
  public static readonly defaultProfilePicUrl: string = "../assets/images/user_profile_img.png";
  public static readonly isProduction: boolean = true;
  public static readonly actualMeasuresServiceUrl: string = "https://secdev.callhealth.com/api/index.php/measures/actual";
  public static readonly aspirationMeasuresServiceUrl: string = "https://secdev.callhealth.com/api/index.php/measures/aspiration";
  public static readonly analysisMeasuresServiceUrl: string = "https://secdev.callhealth.com/api/index.php/measures/analysis";
  public static readonly aspirationListUrl: string = "https://secdev.callhealth.com/api/index.php/measures/aspirationslist";
  public static readonly MeasuresListUrl: string = "https://secdev.callhealth.com";
  public static readonly actual_msrUrl: string = "https://secdev.callhealth.com/api/index.php/measures/msr_actual";
  public static readonly actualListUrl: string = "https://secdev.callhealth.com/api/index.php/measures/actualslist";
  public static readonly annualMeasuresUrl = 'https://secdev.callhealth.com/api/index.php/measures/performance';
  public static readonly pmsUrl: string = "https://qaaccount.callhealth.com/gateway?redirectUrl=https%3A%2F%2Fsecuat.callhealth.com%2Fpms%2Fhandler1.php%23%23internal";
  public static readonly rmsUrl: string = "https://qaaccount.callhealth.com/gateway?redirectUrl=https%3A%2F%2Fdevphpservice.callhealth.com%2Frms%2Fsupport%2Fhandler1.php%2312_3%23rms%23";
  public static readonly login_background_img = "https://qaphpservice.callhealth.com/images/bgimage";
  public static readonly login_background_img_api = "https://qaaccount.callhealth.com/api/bgPicture";
}

