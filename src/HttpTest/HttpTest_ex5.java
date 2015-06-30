package HttpTest;

import java.io.File;
import java.io.IOException;
import java.io.InputStream;

import org.apache.http.HttpEntity;
import org.apache.http.ParseException;
import org.apache.http.client.methods.CloseableHttpResponse;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.BufferedHttpEntity;
import org.apache.http.entity.ContentType;
import org.apache.http.entity.FileEntity;
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
public class HttpTest_ex5 {
	public static void main(String[] args) throws ParseException, IOException {
		CloseableHttpClient httpclient = HttpClients.createDefault();
		HttpGet httpget = new HttpGet(
				"http://localhost/MyPHP/CI/index.php/Welcome");
		CloseableHttpResponse response = httpclient.execute(httpget);
		try {
			HttpEntity entity = response.getEntity();
			if (entity != null) {
				/*
				 * 在某些情況下，實體內容可能需要能夠讀被多次讀取。 在這種情況下實體的內容必須以某種方式被緩沖在內存或磁盤上。
				 * 最簡單的方法是通過BufferedHttpEntity類來封裝原始實體。
				 * 原始實體內容可以從內存中的緩沖區來讀取。其他方式封裝實體都包含原始實體。
				 */
				entity = new BufferedHttpEntity(entity);
				long len = entity.getContentLength();
				if (len != -1 && len < 3500) {
					System.out.println(EntityUtils.toString(entity));

					File file = new File("somefile.txt");

					FileEntity entity1 = new FileEntity(file,
							"text/plain; charset=\"UTF-8\"");

					HttpPost httppost = new HttpPost(
							"http://localhost/MyPHP/CI/index.php/Welcome");

					httppost.setEntity(entity1);

				} else {
					System.out.println(len);
				}
				// Do not need the rest
			}
		} finally {
			response.close();
		}
	}

}
