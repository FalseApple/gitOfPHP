package HttpTest;

import java.io.IOException;
import java.io.InputStream;

import org.apache.http.HttpEntity;
import org.apache.http.ParseException;
import org.apache.http.client.methods.CloseableHttpResponse;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.entity.ContentType;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.CloseableHttpClient;
import org.apache.http.impl.client.HttpClients;
import org.apache.http.util.EntityUtils;
/*
 * 獲取實體內容推薦的方法是通過使用HttpEntity＃getContent（）或HttpEntity＃writeTo（OutputStream中）方法。
 *  HttpClient的還配備了EntityUtils類，它暴露了一些靜態方法，以更輕松地閱讀一個實體的內容或資料。
 *  使用這個類的方法和直接使用java.io.InputStream方法不同的是，他可以檢索字符串中的全部內容機構/字節數組。
 *  強烈建議不要使用EntityUtils，除非響應實體來自一個可信賴的HTTP服務器和已知的有限長度。
 */
public class HttpTest_ex4 {
	public static void main(String[] args) throws ParseException, IOException {
		CloseableHttpClient httpclient = HttpClients.createDefault();
		HttpGet httpget = new HttpGet("http://localhost/MyPHP/CI/index.php/Welcome");
		CloseableHttpResponse response = httpclient.execute(httpget);
		try {
			HttpEntity entity = response.getEntity();
			if (entity != null) {
				InputStream instream = entity.getContent();
				int byteOne = instream.read();
				int byteTwo = instream.read();
				System.out.println(byteOne );
				System.out.println(byteTwo );
				// Do not need the rest
				httpget.abort();
			}
		} finally {
			response.close();
		}
	}

}
